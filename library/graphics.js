/** Created by Luca on 15/06/2016 at 01:05. **/
/** This file is responsible for managing client-side controls. **/

/**
 * This function set the object given as parameter as the "current" object.
 * It should be used in the header menù.
 * @param currentObject
 */
function setCurrent(currentObject) {
    currentObject.id = 'current';
}

/**
 * This function set the tag span into the specified object.
 * It should be used in the sidebar menù.
 * @param currentObject
 * @param string
 */
function setSpan(currentObject, string) {
    currentObject.innerHTML = "<span class='gray'>"+string+"</span>";
}