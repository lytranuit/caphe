/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function(config) {
    config.filebrowserBrowseUrl = '/assets/lib/ckfinder/ckfinder.html',
        config.filebrowserUploadUrl = '/assets/lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        config.filebrowserWindowWidth = '1000',
        config.filebrowserWindowHeight = '700'
}