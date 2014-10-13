/*!
 2
 * IE10 viewport hack for Surface/desktop Windows 8 bug
 3
 * Copyright 2014 Twitter, Inc.
 4
 * Licensed under the Creative Commons Attribution 3.0 Unported License. For
 5
 * details, see http://creativecommons.org/licenses/by/3.0/.
 6
 */


// See the Getting Started docs for more information:

// http://getbootstrap.com/getting-started/#support-ie10-width


(function () {

    'use strict';

    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {

        var msViewportStyle = document.createElement('style')

        msViewportStyle.appendChild(

        document.createTextNode(

        '@-ms-viewport{width:auto!important}'

    )

    )

        document.querySelector('head').appendChild(msViewportStyle)

    }
    
})();