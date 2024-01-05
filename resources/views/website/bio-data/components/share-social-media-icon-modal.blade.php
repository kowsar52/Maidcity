<div class="modal fade" id="shareSocialMediaIconModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body position-relative">
                {{--<div class="position-absolute" style="top: -9px; right: -9px;">
                    <a href="javascript:void(0)" class="btn-custom btn-custom-primary rounded-circle"
                       data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></a>
                </div>--}}
                <div class="row align-items-center justify-content-center g-3" style="height: 103px;">
                    <div class="col-auto">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" class="social-media-icon shadow-sm" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="https://plus.google.com/share?url={{ url()->current() }}" src="{{ \App\Services\GeneralService::getBioDataImage($model->photo) }}" class="social-media-icon shadow-sm" target="_blank">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="whatsapp://send?text={{ url()->current() }}" class="social-media-icon shadow-sm" target="_blank">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="" class="social-media-icon shadow-sm" target="_blank">
                            <i class="far fa-envelope"></i>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="https://twitter.com/share?ref_src={{ url()->current() }}" class="social-media-icon shadow-sm" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                    {{--<div class="col-auto">
                        <a href="" class="social-media-icon shadow-sm">
                            <img width="35" height="35" src="https://img.icons8.com/ios/50/airdrop.png" alt="airdrop"/>
                        </a>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
