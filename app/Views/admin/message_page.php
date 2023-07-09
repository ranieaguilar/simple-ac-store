<?= $this->extend('Admin/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-4">
        <div class="card border-left-primary">
            <div class="card-header">Client</div>
            <div class="card-body">
                <div style="height: 500px; overflow: auto;">
                    <?php foreach($clients as $client):?>
                    <a class="text-decoration-none" href="/Admin/chat/<?= $client['client_id']?>">
                        <div class="fw-bold"><?= $client['client_firstname'] . ' '. $client['client_lastname']?></div>
                    </a>
                    <hr>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card border-left-primary">
            <div class="card-header">
                <?php if(!empty($client_name)):?>
                    <?= $client_name['client_firstname'] .' '.$client_name['client_lastname']?>
                <?php else:?>
                    <p>Conversation</p>
                <?php endif;?>
            </div>
            <div class="card-body">
                <div class="chat_container" style="height : 400px; overflow: auto; padding : 5px 10px 0px 5px">
                    <ul class="list-unstyled">
                        <?php if(!empty($chats)):?>
                        <?php foreach($chats as $chat):?>
                        <?php if($chat['chat_sender'] == 'admin'):?>
                        <li class="justify-content-between">
                            <div class="card w-75 float-right border-success mb-4">
                                <div class="card-header d-flex justify-content-between">

                                    <p class="text-muted small mb-0"><i class="far fa-clock"></i>
                                        <?= $chat['chat_created_at']?></p>
                                    <p class="fw-bold mb-0">You</p>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">
                                        <?= $chat['chat_message']?>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <?php else:?>
                        <li class="justify-content-between">
                            <div class="card w-75 float-left border-primary  mb-4">
                                <div class="card-header d-flex justify-content-between">
                                    <p class="fw-bold mb-0">
                                        <?= $chat['client_firstname'] .' '. $chat['client_lastname']?></p>
                                    <p class="text-muted small mb-0"><i class="far fa-clock"></i>
                                        <?= $chat['chat_created_at']?></p>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">
                                        <?= $chat['chat_message']?>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <?php endif;?>
                        <?php endforeach;?>
                        <?php else:?>
                        <div style="display: flex; justify-content: center; align-items: center; height: 400px; margin: 0;">
                            <h4>No conversation</h4>
                        </div>
                        <?php endif;?>
                    </ul>
                </div>
                <br>
                <form action="/Admin/chat/<?php if(!empty($client_name['client_id'])){echo $client_name['client_id'];}?>" method="post">
                    <div class="form-outline mb-3">
                        <input type="hidden" name="client_id" value="<?php if(!empty($client_name['client_id'])){echo $client_name['client_id'];}?>">
                        <label class="form-label" for="textAreaExample2">Message</label>
                        <textarea class="form-control" id="textAreaExample2" rows="4" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-info btn-rounded float-end">Send</button>
                </form>
            </div>



        </div>
    </div>
</div>
<?= $this->endSection() ?>