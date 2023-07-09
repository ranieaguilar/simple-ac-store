<?= $this->extend('client/layout') ?>
<?= $this->section('content') ?>
<section class=" bg-layer bg-layer-equal-height clearfix">
    <div class="container">
           
                <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-skincolor spacing-2">
                    <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                    <div class="layer-content">
                        <div class="box-header">
                            <div class="box-icon">
                                <i class="fa fa-paper-plane"></i>
                            </div>
                        </div>
                        <h4>Contact Information</h4>
                        <ul class="ttm_contact_widget_wrapper">
                            <li><i class="ttm-textcolor-highlight ti ti-location-pin"></i>1212 Paint Valley Road East
                                Rutherford, New York</li>
                            <li><i class="ttm-textcolor-highlight ti ti-headphone"></i>123-456-7890</li>
                            <li><i class="ttm-textcolor-highlight ti ti-files"></i>123-46789-1234</li>
                            <li><i class="ttm-textcolor-highlight ti ti-email"></i><a
                                    href="http://www.example.com/">http://www.example.com</a></li>
                        </ul>
                        <div class="social-icons circle social-hover">
                            <ul class="list-inline">
                                <li class="social-facebook"><a class="tooltip-top ttm-textcolor-skincolor" href="#"
                                        data-tooltip="Facebook"><i class="ti ti-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li class="social-linkedin"><a class="tooltip-top ttm-textcolor-skincolor" href="#"
                                        data-tooltip="Facebook"><i class="ti ti-linkedin" aria-hidden="true"></i></a>
                                </li>
                                <li class="social-gplus"><a class="tooltip-top ttm-textcolor-skincolor" href="#"
                                        data-tooltip="Google+"><i class="ti ti-google" aria-hidden="true"></i></a></li>
                                <li class="social-twitter"><a class="tooltip-top ttm-textcolor-skincolor" href="#"
                                        data-tooltip="Twitter"><i class="ti ti-twitter-alt" aria-hidden="true"></i></a>
                                </li>
                                <li class="social-linkedin"><a class="tooltip-top ttm-textcolor-skincolor" href="#"
                                        data-tooltip="LinkedIn"><i class="ti ti-tumblr-alt" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
           
    </div>
</section>
<!--login-section end-->
<?= $this->endSection() ?>