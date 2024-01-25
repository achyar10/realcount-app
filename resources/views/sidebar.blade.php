<aside class="sidebar">
    <div class="swidget swidget-covid">
        <div class="hlm-title">
            <span class="hlm-title-blueborder">
                <span class="strong">Kepala Dinas</span>
            </span>
        </div>

        <div class="swidget rect-banner pointer" data-toggle="modal" data-target="#modalViewsambutan">
            <a rel="nofollow"><img src="{{ asset('pic/' . config('setting.pic_photo')) }}"
                    title="Baca sambutan Kepala Dinas"></a>
            <div class="text-center">
                <button type="submit" class="btn btn-light btn-sm text-uppercase" data-toggle="modal"
                    data-target="#modalViewsambutan" title="Baca Sambutan Kepala Dinas">
                    {{ config('setting.pic') }}

                </button>
            </div>
        </div>
    </div>


    <!-- COVID-19  -->
    <div class="swidget swidget-covid">
        <div class="hlm-title">
            <span class="hlm-title-blueborder">
                <span class="strong">Update</span>
                <span>Covid-19</span>
            </span>
        </div>

        <div class="covid-19 swidget-wrap">
            <script type="text/javascript" src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>
            <div id="gpr-kominfo-widget-container"></div><br>
        </div>
    </div>


    <!-- KANTOR KAMI  -->
    <div class="swidget infogwidget">
        <div class="bloktitle">KANTOR KAMI</div>

        <div class="infogwidget__row">
            <style type="text/css" media="screen">
                iframe {
                    height: 250px;
                    width: 100%;
                }

            </style>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.1369737286846!2d123.4043691143332!3d-8.388185886927594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dab73867f9b5147%3A0xcd1190d849e57905!2sDatagoe%20Software!5e0!3m2!1sid!2sid!4v1623407918344!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</aside>
