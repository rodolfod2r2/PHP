<?php
/**
 * Created by PhpStorm.
 * User: Rodolfo
 * Date: 16/01/2018
 * Time: 01:08
 */

namespace apptv\service;


class DailyMotion {

    const API_DAILYMOTION = "https://api.dailymotion.com/";
    const USERID_DAILYMOTION = "TheNoite";
    const USER_DAILYMOTION = "user/";
    const USERS_DAILYMOTION = "users";
    const CHANNEL_DAILYMOTION = "channel/";
    const CHANNELS_DAILYMOTION = "channels";
    const PLAYLIST_DAILYMOTION = "playlist";
    const PLAYLISTS_DAILYMOTION = "playlists";
    const VIDEO_DAILYMOTION = "video";
    const VIDEOS_DAILYMOTION = "videos/";
    const CHANNELID_DAILYMOTION = DailyMotion::USERID_DAILYMOTION;

    public function httpGet($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 3);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function channelUser() {
        $channelUrl = DailyMotion::API_DAILYMOTION . DailyMotion::USER_DAILYMOTION . DailyMotion::USERID_DAILYMOTION;
        $channelParams = "?fields=avatar_720_url,cover_url,screenname";
        return $channelUrl . $channelParams;
    }

    public function channelID() {
        $channelUrl = DailyMotion::API_DAILYMOTION . DailyMotion::PLAYLIST_DAILYMOTION;
        $channelParams = "/" . $_REQUEST['playlistid'] . "?fields=description,id,name,owner.cover_url";
        return $channelUrl . $channelParams;
    }

    public function playlistURI() {
        $playlistUrl = DailyMotion::API_DAILYMOTION . DailyMotion::PLAYLISTS_DAILYMOTION;
        $playlistParams = "?fields=id,name,owner.cover_url,thumbnail_360_url,&owner=" . DailyMotion::USERID_DAILYMOTION . "&sort=alphaaz&limit=50";
        return $playlistUrl . $playlistParams;
    }

    public function playlistItemsURI($getplaylistId) {
        $playlistItemsUrl = DailyMotion::API_DAILYMOTION . DailyMotion:: PLAYLIST_DAILYMOTION;
        $playlistItemsParams = "/" . $getplaylistId . "/" . DailyMotion::VIDEOS_DAILYMOTION . "?fields=id,thumbnail_360_url,title,description&limit=6";
        return $playlistItemsUrl . $playlistItemsParams;
    }

    public function playlistItemsURIMAX($getplaylistId) {
        $playlistItemsUrl = DailyMotion::API_DAILYMOTION . DailyMotion::PLAYLIST_DAILYMOTION;
        $playlistItemsParams = "/" . $getplaylistId . "/" . DailyMotion::VIDEOS_DAILYMOTION . "?fields=id,thumbnail_360_url,thumbnail_240_url,title&limit=50";
        return $playlistItemsUrl . $playlistItemsParams;
    }

    public function videoItemURI($getvideoId) { //https://api.dailymotion.com/playlist/x4k75e/videos/x5ruoeo
        $videoItemUrl = DailyMotion::API_DAILYMOTION . DailyMotion::PLAYLIST_DAILYMOTION;
        $videoItemParams = "/" . $_REQUEST['playlistid'] . "/" . DailyMotion::VIDEOS_DAILYMOTION . $getvideoId . "?fields=description,id,thumbnail_120_url,title";
        return $videoItemUrl . $videoItemParams;
    }

    public function loadProgram($playListUrl) {
        $playlist = DailyMotion::httpGet($playListUrl);
        $json_playlist = json_decode($playlist);
        foreach ($json_playlist->list as $PlayList) {
            $viewListChannel = "
                <div class=\"col-md-3\">
                    <div class=\"thumb-post\">
                        <a href=\"channel.php?playlistid=%s\">
                            <img src=\"%s\" height=\"180px\" />
                            <div class=\"caption\">
                                <h4>%s</h4>
                            </div>
                        </a>
                    </div>
                </div>
            ";
            printf($viewListChannel,
                $PlayList->id,
                $PlayList->thumbnail_360_url,
                substr($PlayList->name, 0, 30)
            );
        }
    }

    public function loadHeader($infoHeader, $infoHeaderTittle) {
        $header_page = DailyMotion::httpGet($infoHeader);
        $json_header = json_decode($header_page);
        $headerTitle_page = DailyMotion::httpGet($infoHeaderTittle);
        $json_headerTitle = json_decode($headerTitle_page);
        $viewDetalheChannel = "
            <section>
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <div class=\"full-width-image\">
                            <img src=\"%s\" alt=\"xx\" style=\"width: 100%%; max-height: 250px; object-fit: none; object-position: center; \" />
                            <img src=\"%s\" alt=\"x\" class=\"thumb-image\" />
                            <div class=\"thumb-title\">%s</div>
                        </div>
                    </div>
                </div>
            </section>
            <section class=\"mtop\"></section>
        ";
        printf(
            $viewDetalheChannel,
            $json_header->{'owner.cover_url'},
            $json_headerTitle->list[0]->thumbnail_360_url,
            $json_header->name
        );
    }

    public function loadListItemChannelDetails($playlistItemsUrl) {
        $playlist = DailyMotion::httpGet($playlistItemsUrl);
        $json_playlist = json_decode($playlist);
        foreach ($json_playlist->list as $PlayListVideo) {
            $viewListVideo = "
                <div class=\"col-md-3\">
                    <div class=\"thumb-post\">
                        <a href=\"video.php?playlistid=%s&vid=%s\">
                            <img src=\"%s\" height=\"180px\" />
                            <div class=\"caption\">
                                <p>%s [...]</p>
                            </div>
                        </a>
                    </div>
                </div>
            ";
            printf($viewListVideo,
                $_REQUEST['playlistid'],
                $PlayListVideo->id,
                $PlayListVideo->thumbnail_240_url,
                substr($PlayListVideo->title, 0, 30)
            );
        }
    }

    public function loadVideo($videoID) {
        $videoItem = DailyMotion::httpGet($videoID);
        $json_videoItem = json_decode($videoItem);
        $viewVideo = "
             <section>
                <div class=\"row\">
                    <div class=\"col-md-6 col-md-offset-3\">
                        <div class=\"embed-responsive embed-responsive-16by9\">
                            <iframe class=\"embed-responsive-item\"  src=\"//www.dailymotion.com/embed/video/%s?autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
             </section>
             <section class=\"mtop\">
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <a href=\"channel.php?playlistid=%s\" >
                            <div class=\"full-width-image\">
                                <img src=\"%s\" alt=\"x\" class=\"thumb-image\" />
                                <div class=\"thumb-title\">%s</div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <section class=\"mtop\">
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <p>Descrição : %s</p>
                    </div>
                </div>
            </section>
        ";
        printf($viewVideo,
            $json_videoItem->list[0]->id,
            $_REQUEST['playlistid'],
            $json_videoItem->list[0]->thumbnail_120_url,
            $json_videoItem->list[0]->title,
            $json_videoItem->list[0]->description
        );
    }
}