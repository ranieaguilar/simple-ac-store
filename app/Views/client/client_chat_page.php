<?= $this->extend('client/layout') ?>
<?= $this->section('content') ?>
<section class="sidebar ttm-sidebar-right clearfix">
    <div class="container">
        <!-- row -->

        <!-- post -->
        <article class="post ttm-blog-classic clearfix mt-4">
            <!-- post-featured-wrapper -->
            <div class="ttm-post-featured-wrapper ttm-featured-wrapper">
            </div><!-- post-featured-wrapper end -->
            <!-- ttm-blog-classic-content -->
            <div class="ttm-blog-classic-content">
                <div class="entry-content">

                    <div class="ttm-blog-classic-box-comment">
                        <div id="comments" class="comments-area">
                            <div class="chat_container" style="
  height : 500px; overflow: auto; padding : 5px 10px 0px 5px">
                                <ol class="comment-list">
                                    <?php foreach($chats as $chat):?>
                                    <?php if($chat['chat_sender'] == 'admin'):?>
                                    <li>
                                        <div class="comment-body">
                                            <!-- <div class="comment-author vcard">
                                                                <img src="images/blog/blog-comment-01.jpg" class="avatar" alt="comment-img">
                                                            </div> -->
                                            <div class="comment-box">
                                                <div class="comment-meta commentmetadata">
                                                    <cite class="ttm-comment-owner"><?= $chat['chat_sender']?></cite>
                                                    <span><?= $chat['chat_created_at']?></span>
                                                </div>
                                                <!-- <div class="reply">
                                                                    <a rel="nofollow" class="comment-reply-link" href="#">Reply</a>
                                                                </div> -->
                                                <div class="author-content-wrap">
                                                    <p><?= $chat['chat_message']?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php else:?>
                                    <li>
                                        <div class="comment-body">
                                            <!-- <div class="comment-author vcard">
                                                                <img src="images/blog/blog-comment-01.jpg" class="avatar" alt="comment-img">
                                                            </div> -->
                                            <div class="comment-box">
                                                <div class="comment-meta commentmetadata">
                                                    <cite class="ttm-comment-owner">You</cite>
                                                    <span><?= $chat['chat_created_at']?></span>
                                                </div>
                                                <!-- <div class="reply">
                                                                    <a rel="nofollow" class="comment-reply-link" href="#">Reply</a>
                                                                </div> -->
                                                <div class="author-content-wrap" style="white-space: pre-line;">
                                                    <p><?= $chat['chat_message']?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endif;?>
                                    <?php endforeach;?>
                                </ol>
                            </div>
                           
                            <div class="comment-respond">
                                <h3 class="comment-reply-title">Send a Message</h3>
                                <form action="/Client/chat/<?= session()->get('client_id')?>" method="post"
                                    id="commentform" class="comment-form">
                                    <input type="hidden" name="client_id" value="<?= session()->get('client_id')?>">
                                    <p class="comment-form-comment">
                                        <textarea id="comment" placeholder="Message" name="message" cols="45" rows="2"
                                            aria-required="true" required></textarea>
                                    </p>
                                    <p class="form-submit mt-40">
                                        <input name="submit" type="submit" id="submit"
                                            class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor"
                                            value="Send">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- ttm-blog-classic-content end -->
        </article><!-- post end -->
    </div>
</section>
<?= $this->endSection() ?>