<section class="section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

				<?php if ( comments_open() && get_comments_number() ): ?>

                    <!--comments area start-->
                    <div class="comments">
                        <h2 class="comments-title"> نظرات</h2>
                        <ul>
							<?php
							/*------------------------------
							* Comments list style and setting
							*----------------------------*/
							wp_list_comments( array (
								'type'        => 'comment',
								'style'       => 'ul',
								'max_depth'   => 3,
								'avatar_size' => 880,
								'callback'    => '\MrBasirnia\App\Helpers\Clab_Helper::clab_blog_comments_list_style'
							),
								get_comments( array ( 'post_id' => get_the_ID() ) )
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
                    <form role="form" class="comment-form">
                        <div class="row">
                            <div class=" col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="نام*" required="">
                                </div>
                            </div>
                            <div class=" col-md-4">
                                <div class="form-group ">
                                    <input type="email" class="form-control" placeholder="ایمیل*" required="">
                                </div>
                            </div>
                            <div class=" col-md-4">
                                <div class="form-group ">
                                    <input type="text" class="form-control" placeholder="وب سایت" required="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <textarea id="message" rows="5" placeholder="نظر*" class="form-control"
                                          required=""></textarea>
                            </div>
                        </div>
                        <p class="text-muted">آدرس ایمیل شما منتشر نخواهد شد. فیلدهای مورد نیاز علامت گذاری شده اند
                            *</p>
                        <div class="text-center mt-md-5">
                            <button type="submit" class="btn btn-theme">ارسال</button>
                        </div>
                    </form>
                </div>
                <!--comment form end-->
            </div>
        </div>
    </div>
</section>