<div class="wrap" id="wp-trix">

    <h2><?php _e( 'WP Trix Editor', 'wp-trix' ); ?></h2>

    <hr>

    <form action="#" style="width: 50%;">
        <div class="trix-editor-container">
            <trix-toolbar class="trix-toolbar" id="trix-toolbar">
                <div class="trix-button-groups">
                    <span class="trix-button-group">
                        <button type="button" class="bold" data-trix-attribute="bold" data-trix-key="b" title="Bold"><i class="dashicons dashicons-editor-bold"></i></button>
                        <button type="button" class="italic" data-trix-attribute="italic" data-trix-key="i" title="Italic"><i class="dashicons dashicons-editor-italic"></i></button>
                        <button type="button" class="strike" data-trix-attribute="strike" title="Strikethrough"><i class="dashicons dashicons-editor-strikethrough"></i></button>
                        <button type="button" class="link" data-trix-attribute="href" data-trix-action="link" data-trix-key="k" title="Link"><i class="dashicons dashicons-admin-links"></i></button>
                    </span>

                    <span class="trix-button-group">
                        <button type="button" class="quote" data-trix-attribute="quote" title="Quote"><i class="dashicons dashicons-editor-quote"></i></button>
                        <button type="button" class="code" data-trix-attribute="code" title="Code"><i class="dashicons dashicons-editor-code"></i></button>
                        <button type="button" class="list bullets" data-trix-attribute="bullet" title="Bullets"><i class="dashicons dashicons-editor-ul"></i></button>
                        <button type="button" class="list numbers" data-trix-attribute="number" title="Numbers"><i class="dashicons dashicons-editor-ol"></i></button>
                        <button type="button" class="block-level decrease" data-trix-action="decreaseBlockLevel" title="Decrease Level" disabled=""><i class="dashicons dashicons-editor-outdent"></i></button>
                        <button type="button" class="block-level increase" data-trix-action="increaseBlockLevel" title="Increase Level" disabled=""><i class="dashicons dashicons-editor-indent"></i></button>
                    </span>

                    <span class="trix-button-group">
                        <button type="button" class="undo" data-trix-action="undo" data-trix-key="z" title="Undo"><i class="dashicons dashicons-undo"></i></button>
                        <button type="button" class="redo" data-trix-action="redo" data-trix-key="shift+z" title="Redo" disabled=""><i class="dashicons dashicons-redo"></i></button>
                    </span>

                    <span class="trix-button-group">
                        <button type="button" class="trix-image-uploader"><i class="dashicons dashicons-format-image"></i></button>
                        <span class="trix-dropdown">
                            <button type="button" class="trix-dropdown-btn"><i class="dashicons dashicons-tag"></i> <i class="dashicons dashicons-arrow-down"></i></button>
                            <ul class="trix-dropdown-list">
                                <li><button type="button" class="trix-dropdown-btn" data-trix-content="{full_name}">Full Name</button></li>
                                <li><button type="button" class="trix-dropdown-btn" data-trix-content="{first_name}">First Name</button></li>
                                <li><button type="button" class="trix-dropdown-btn" data-trix-content="{last_name}">Last Name</button></li>
                                <li><button type="button" class="trix-dropdown-btn" data-trix-content="{username}">Username</button></li>
                            </ul>
                        </span>
                    </span>
                </div>

                <div class="trix-dialogs">
                    <div class="dialog link_dialog" data-trix-attribute="href" data-trix-dialog="href">
                        <div class="link_url_fields">
                            <div class="button-group">
                                <input type="url" class="trix-link-input" required="" name="href" placeholder="Enter a URL…" disabled="disabled">
                                <input type="button" class="button" value="Link" data-trix-method="setAttribute">
                                <input type="button" class="button" value="Unlink" data-trix-method="removeAttribute">
                            </div>
                        </div>
                    </div>
                </div>
            </trix-toolbar>

            <trix-editor class="trix-editor" toolbar="trix-toolbar" input="trix-content"></trix-editor>
            <input type="hidden" id="trix-content" value="">
        </div>
    </form>

</div>