/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	// config.htmlEncodeOutput = false;
	// config.entities = true;
	config.height = '400px';

	config.filebrowserBrowseUrl = '/public/filemanager/index.html';

	config.removePlugins = 'save,a11yhelp,about,bidi,dialogadvtab,div,find,flash,floatingspace,forms,horizontalrule,indentblock,language,magicline,maximize,newpage,pagebreak,preview,print,scayt,showblocks,showborders,smiley,specialchar,stylescombo,tab,table,tabletools,templates,wsc,selectall';

	 config.removeButtons= '';
};
