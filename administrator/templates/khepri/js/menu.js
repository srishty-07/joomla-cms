/**
 * @version		$Id: menu.js 11813 2009-05-14 14:29:32Z pentacle $
 * @copyright	Copyright (C) 2005 - 2009 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 */

/**
 * JMenu javascript behavior
 *
 * @package		Joomla
 * @since		1.5
 * @version     1.0
 */
var JMenu = new Class({
	initialize: function(el)
	{
		var elements = $(el).getElements('li');
		var nested = null
		for (var i=0; i<elements.length; i++)
		{
			var element = elements[i];

			element.addEvent('mouseover', function(){ this.addClass('hover'); });
			element.addEvent('mouseout', function(){ this.removeClass('hover'); });

			//find nested UL
			nested = element.getElement('ul');
			if(!nested) {
				continue;
			}

			//declare width
			var offsetWidth  = 0;

			//find longest child
			for (k=0; k < nested.childNodes.length; k++) {
				var node  = nested.childNodes[k]
				if (node.nodeName == "LI")
					offsetWidth = (offsetWidth >= node.offsetWidth) ? offsetWidth :  node.offsetWidth;
			}

			//match longest child
			for (l=0; l < nested.childNodes.length; l++) {
				var node = nested.childNodes[l]
				if (node.nodeName == "LI") {
					$(node).setStyle('width', offsetWidth+'px');
				}
			}

			$(nested).setStyle('width', offsetWidth+'px');
		}
	}
});

document.menu = null;
window.addEvent('load', function(){
	element = $('menu');
	if(!element.hasClass('disabled')) {
		var menu = new JMenu(element);
		document.menu = menu;
	}
});