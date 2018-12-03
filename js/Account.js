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
   * @param login
   * @param password
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
   * Verifies that at least one person is authenticated (checks account info in web storage).
   * Returns true if someone is authenticated; otherwise returns false.
   */
  function isAuthenticated() {
    let accounts = JSON.parse(Storage.getData("accounts"));
    // Get account data from local storage.
    if (accounts !== null) {
      for (var i = 0; i < accounts.length; i++) {
        let account = accounts[i];
        if (account.authenticated === true) {
          return account.authenticated;
        }
      }
    }
    return false;
  }

  /**
   * Verifies that the given login is authenticated (checks account info in web storage).
   * Returns true if user with provided login authenticated; otherwise returns false.
   *
   * @param login  The login to check.
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



  // Expose these functions.
  return {
    verifyData: verifyData,
    authenticate: authenticate,
    isAuthenticated: isAuthenticated,
    isUserAuthenticated: isUserAuthenticated,
    createAccount: createAccount
  };

})();
