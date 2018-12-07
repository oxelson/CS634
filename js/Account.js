/**
 * Module for assessing and loading account data needed by the website from
 * web storage and handles user authentication.
 *
 * @authors: Hossam Abdel-Ghaffar, Long Nguyen, & Jennifer Oxelson Ganter
 */
let Account = (function () {

  /**
   * Looks to see if account data is already in web storage, and if it
   * isn't get the initial account data and adds to local storage.
   */
  function verifyData() {
    // Load account data into local storage if it isn't present.
    if (!Storage.isStored("accounts")) {
      console.log('Initializing accounts in local storage...');
      // Load the data into storage.
      getAccountData();
    }
  }

  /**
   * Loads Account JSON via AJAX request and returns string version of JSON object.
   */
  function getAccountData() {
    $.ajax({
      url: 'http://www.cs634-hur-01.designaspractice.com/js/Accounts.JSON'
    }).done(function (data) {
      // Load into local storage.
      Storage.addData('accounts', JSON.stringify(data.accounts));
    }).fail(function (request) {
      let message = 'Unable to load account JSON data via AJAX.';
      alert(message);
      console.log(message);
    });
  }

  /**
   * This function will validate user login by comparing login and password value
   * with predefined values in web storage. Return true if both login and password
   * matched. Otherwise, return false.
   *
   * @param login  The login
   * @param password  The password
   * @returns {boolean} true if both login and password matched. Otherwise, return false
   */
  function authenticate(login, password) {
    let authenticated = false;
    let accounts = JSON.parse(Storage.getData("accounts"));
    let updatedAccounts = []; // Not the best way to handle it, but it works.
    // Get account data from local storage.
    if (accounts !== null) {
      for (var i = 0; i < accounts.length; i++){
        let account = accounts[i];
        if (account.login === login && account.password === password) {
          // Change authenticated to true in web storage.
          account.authenticated = true;
          updatedAccounts.push(account);
          authenticated = true;
          manageLoginLink(account);
        } else {
          updatedAccounts.push(account);
        }
      }
    } else {
      let message = 'No account data found.  Create an account!';
      alert(message);
      console.log(message);
    }
    Storage.addData("accounts", JSON.stringify(updatedAccounts));
    return authenticated;
  }

  /**
   * The opposite of the authenticate() method. It changes authentication = false
   * for the authenticated user in web storage.
   *
   * @returns {boolean} true if user is still authenticated (indicating failure); otherwise false.
   */
  function logout() {
    let authenticated = true;

    let accounts = JSON.parse(Storage.getData("accounts"));
    let updatedAccounts = []; // Not the best way to handle it, but it works.
    // Get account data from local storage.
    if (accounts !== null) {
      for (var i = 0; i < accounts.length; i++){
        let account = accounts[i];
        let auth = account.authenticated;
        if (auth) {
          // Change authenticated to true in web storage.
          account.authenticated = false;
          updatedAccounts.push(account);
          authenticated = false;
          toggleLoginLink(false);
        } else {
          updatedAccounts.push(account);
        }
      }
    }
    Storage.addData("accounts", JSON.stringify(updatedAccounts));
    return authenticated;
  }

  /**
   * Invokes the toggleLoginLink() method using the provided user account.
   * Attempts to determine whether user is authenticated or not if no user
   * account provided.
   *
   * @param account  The authenticated user's account (can be undefined).
   */
  function manageLoginLink(account) {
    // Handed an account, so the user already is authenticated.
    if (account !== undefined) {
      toggleLoginLink(true);
    } else {
      // No account given, see if we can determine if user is authenticated.
      account = isAuthenticated();
      // And try again...
      if (account !== null) {
        // Able to detect the user is authenticated.
        toggleLoginLink(true);
      } else {
        // Still not logged in.
        toggleLoginLink(false);
      }
    }
  }

  /**
   * Toggles the login/logout link in the header to show the appropriate
   * text/link depending on the provided authentication status.
   *
   * @param isAuthenticated  true if user is authenticated; otherwise false.
   */
  function toggleLoginLink(isAuthenticated) {
    let loginLink = $("header nav .login");
    let dropDownMenuLink = $('header #menu_nav ul li .login');
    if (isAuthenticated) {
      // User is authenticated.
      $(loginLink).attr("href", "/account/logout.php");
      $(loginLink).text("LOGOUT");
      $(dropDownMenuLink).attr("href", "/account/logout.php");
      $(dropDownMenuLink).text("LOGOUT");
    } else {
      // Not authenticated.
      $(loginLink).attr("href", "/account");
      $(loginLink).text("LOGIN");
      $(dropDownMenuLink).attr("href", "/account");
      $(dropDownMenuLink).text("LOGIN");
    }
  }

  /**
   * Verifies that at least one person is authenticated (checks account info in web storage).
   * Returns the authenticated account; otherwise returns null.
   *
   * @returns  Authenticated account; otherwise returns null.
   */
  function isAuthenticated() {
    let accounts = JSON.parse(Storage.getData("accounts"));
    // Get account data from local storage.
    if (accounts !== null) {
      for (var i = 0; i < accounts.length; i++) {
        let account = accounts[i];
        if (account.authenticated === true) {
          return account;
        }
      }
    }
    return null;
  }

  /**
   * Verifies that the given login is authenticated (checks account info in web storage).
   * Returns true if user with provided login authenticated; otherwise returns false.
   *
   * @param login  The login to check.
   * @returns {boolean}  true if user with provided login authenticated; otherwise returns false
   */
  function isUserAuthenticated(login) {
    let accounts = JSON.parse(Storage.getData("accounts"));
    // Get account data from local storage.
    if (accounts !== null) {
      for (var i = 0; i < accounts.length; i++) {
        let account = accounts[i];
        if (account.login === login) {
          return account.authenticated;
        }
      }
    }
    return false;
  }

  /**
   * Creates an account and stashes the data in web storage.  Returns
   * true if account was created successfully; otherwise returns false
   * if an account with the same login already exists.
   *
   * @param account  The account to create
   * @returns {boolean}  true if account was created successfully; otherwise returns false
   */
  function createAccount(account) {
    let accounts = JSON.parse(Storage.getData("accounts"));
    // Get account data from local storage.
    if (accounts !== null) {
      for (var i = 0; i < accounts.length; i++) {
        let a = accounts[i];
        if (a.login === account.login) {
          return false;
        }
      }
      accounts.push(account);
    } else {
      accounts = [];
    }
    Storage.addData("accounts", JSON.stringify(accounts));
    return true
  }

  /**
   * Updates the provided account in web storage.  Returns the updated account
   * or null if there was an issue with updating the account.
   *
   * @param account  The account to create
   * @returns  Updated account or null
   */
  function updateAccount(account) {
    let updated = null;
    let accounts = JSON.parse(Storage.getData("accounts"));
    let updatedAccounts = []; // Not the best way to handle it, but it works.
    // Get account data from local storage.
    if (accounts !== null) {
      for (var i = 0; i < accounts.length; i++){
        let a = accounts[i];
        if (a.login === account.login) {
          updatedAccounts.push(account);
          updated = account;
        } else {
          updatedAccounts.push(account);
        }
      }
    }
    Storage.addData("accounts", JSON.stringify(updatedAccounts));
    return updated;
  }

  /**
   * Deletes account of the provided login form web storage.  Returns true if deletion was successful;
   * otherwise false if unsuccessful or if login === tanya.
   *
   * @param login  The login corresponding to the account to delete
   * @returns {boolean}  true if deletion was successful; otherwise false if unsuccessful or if login === tanya
   */
  function removeAccount(login) {
    if (login === "tanya" || login === "student") {
      return false;
    }
    let accounts = JSON.parse(Storage.getData("accounts"));
    let updatedAccounts = []; // Not the best way to handle it, but it works.
    // Get account data from local storage.
    if (accounts !== null) {
      for (var i = 0; i < accounts.length; i++){
        let account = accounts[i];
        if (account.login !== login) {
          updatedAccounts.push(account);
        }
      }
    }
    Storage.addData("accounts", JSON.stringify(updatedAccounts));
    toggleLoginLink(false);
    return accounts.length > updatedAccounts.length;
  }

  // Expose these functions.
  return {
    verifyData: verifyData,
    authenticate: authenticate,
    logout: logout,
    manageLoginLink: manageLoginLink,
    isAuthenticated: isAuthenticated,
    isUserAuthenticated: isUserAuthenticated,
    createAccount: createAccount,
    updateAccount: updateAccount,
    removeAccount: removeAccount
  };

})();
