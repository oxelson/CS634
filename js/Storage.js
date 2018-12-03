/**
 * Module for accessing data in web storage.
 *
 * @authors: Hossam Abdel-Ghaffar, Long Nguyen, & Jennifer Oxelson Ganter
 */
let Storage = (function () {
  /**
   * General function called to add a key/value pair to local storage.
   *
   * @param key  The key used to store the data in local storage.
   * @param value  The data to be stored in local storage.
   */
  function addData(key, value) {
    localStorage.setItem(key, value);
  }

  /**
   * General function called to check if a key exists in local storage.
   *
   * @param key  The key to look for in local storage.
   */
  function isStored(key) {
    let value = getData(key);
    if (value !== null) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * General function called to retrieve a value from local storage.
   *
   * @param key  The key used to retrieve the data in local storage.
   */
  function getData(key) {
    return localStorage.getItem(key);
  }

  /**
   * General function called to remove a key/value pair to local storage.
   *
   * @param key  The key to remove the data in local storage.
   */
  function removeData(key) {
    localStorage.removeItem(key);
  }

  // Expose these functions.
  return {
    addData: addData,
    isStored: isStored,
    getData: getData,
    removeData: removeData
  };
})();
