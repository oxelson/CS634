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
    if (typeof(Storage) !== 'undefined') {
      localStorage.setItem(key, value);
    } 
  }

  /**
   * General function called to check if a key exists in local storage.
   *
   * @param key  The key to look for in local storage.
   */
  function isStored(key) {
    if (typeof(Storage) !== 'undefined') {
      localStorage.hasOwnProperty(key);
    }
  }

  /**
   * General function called to retrieve a value from local storage.
   *
   * @param key  The key used to retrieve the data in local storage.
   */
  function getData(key) {
    if (typeof(Storage) !== 'undefined') {
      return localStorage.getItem(key);
    }
  }

  /**
   * General function called to remove a key/value pair to local storage.
   *
   * @param key  The key to remove the data in local storage.
   */
  function removeData(key) {
    if (typeof(Storage) !== 'undefined') {
      localStorage.removeItem(key);
    }
  }

  // Expose these functions.
  return {
    addData: addData,
    isStored: isStored,
    getData: getData,
    removeData: removeData
  };
})();
