<section class="section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

				<?php if ( comments_open() && get_comments_number() ) : ?>

                    <!--comments area start-->
                    <div class="comments">
                        <h2 class="comments-title"> نظرات</h2>
                        <ul>
							<?php
							/*------------------------------
							* Comments list style and setting
							*----------------------------*/
							wp_list_comments( array(
								'type'        => 'comment',
								'style'       => 'ul',
								'max_depth'   => 3,
								'avatar_size' => 880,
								'callback'    => '\MrBasirnia\App\Helpers\Clab_Helper::clab_blog_comments_list_style',
							),
								get_comments( array( 'post_id' => get_the_ID() ) )
							);
							?>
                        </ul>
                    </div>
                    <!--comments area end-->

				<?php endif; ?>

                <!--comment form start-->
                <div class="comment-respond">
                    <h3 class="comment-reply-title mb-lg-5 mb-4">
                        پیام بگذارید
                    </h3>

					<?php
					/*------------------------------------
					*  Single Page Comment Form
					* ---------------------------------*/
					?>
					<?php comment_form( array(
						'format'               => 'html5',
						'title_reply'          => '',
						'fields'               => array(
							'author' => '
                            <div class="row">
                                <div class=" col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="author" class="form-control" placeholder="نام*" required="">
                                    </div>
                                </div>
						',
							'email'  => '
                                <div class=" col-md-4">
                                    <div class="form-group ">
                                        <input type="email" name="email" class="form-control" placeholder="ایمیل*" required="">
                                    </div>
                                </div>
						',
							'url'    => '
                                <div class=" col-md-4">
                                    <div class="form-group ">
                                        <input type="text" name="url" class="form-control" placeholder="وب سایت" required="">
                                    </div>
                                </div>
                             </div>
                        ',
						),
						'comment_field'        => '
                            <div class="form-group">
                                <div class="controls">
                                    <textarea id="message" name="comment" rows="5" placeholder="نظر*" class="form-control"
                                              required=""></textarea>
                                </div>
                            </div>
                        ',
						'submit_button'        => '
                            <div class="text-center mt-md-5">
                                <button type="submit" class="btn btn-theme">ارسال</button>
                            </div>
                        ',
						'comment_notes_before' => '<p class="text-muted">آدرس ایمیل شما منتشر نخواهد شد. فیلدهای مورد نیاز علامت گذاری شده اند *</p>',
						'title_reply_before'   => '<h5 id="reply-title" class="comment-reply-title">',
						'title_reply_after'    => '</h5>',
					), get_the_ID() ); ?>

                </div>
                <!--comment form end-->
            </div>
        </div>
    </div>
</section>