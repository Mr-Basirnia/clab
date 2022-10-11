<div class="wrap">
    <h1 class="wp-heading-inline">تنظیمات عمومی Clab</h1>
    <form action="" method="post">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row"><label for="title">عنوان صفحه اصلی</label></th>
                <td>
                    <input name="title" type="text" id="title" value="<?php echo get_option( 'clab_home_title', '' ) ?>" class="regular-text">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="description">معرفی کوتاه</label></th>
                <td>
                    <textarea id="description" name="description" rows="4" cols="50" maxlength="200"><?php echo get_option( 'clab_home_description', '' ) ?></textarea>
                </td>
            </tr>
            <tr>
                <th scope="row">پست های مرتبط</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span>پست های مرتبط</span></legend>
                        <label for="related_posts_is_active">
                            <input name="related_posts_is_active" type="checkbox" id="related_posts_is_active" <?php checked( get_option( 'clab_related_posts_is_active', 1 ), 1 ) ?>>
                            نمایش پست های مرتبط
                        </label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row">دیدگاه ها</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span>دیدگاه ها</span></legend>
                        <label for="comments_dp_is_active">
                            <input name="comments_dp_is_active" type="checkbox" id="comments_dp_is_active" <?php checked( get_option( 'clab_dp_comments_is_active', 1 ), 1 ) ?>>
                            نمایش دیدگاه ها
                            <p class="description" id="tagline-description">
                                تنها صفحه داخلی پست ها شامل تغییرات می شود .
                            </p>
                        </label>
                    </fieldset>
                    <fieldset>
                        <legend class="screen-reader-text"><span>دیدگاه ها</span></legend>
                        <label for="comments_write_is_active">
                            <input name="comments_write_is_active" type="checkbox" id="comments_write_is_active" <?php checked( get_option( 'clab_comments_write_is_active', 1 ), 1 ) ?>>
                            نوشتن دیدگاه جدید
                            <p class="description" id="tagline-description">
                                در تمام صفحات تاثیر می گذارد.
                            </p>
                        </label>
                    </fieldset>
                </td>
            </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="ذخیرهٔ تغییرات">
        </p>
    </form>
</div>