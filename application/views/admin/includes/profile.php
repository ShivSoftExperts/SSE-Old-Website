<div class="row m-b-lg m-t-lg">
    <div class="col-md-6">

        <div class="profile-image">
            <?php if ($profile_details->profile != '') { ?>
                <!--img-circle circle-border-->
                <img src="<?= base_url() . $profile_details->profile; ?>" class="img-thumbnail m-b-md" alt="profile">
            <?php } else { ?>
                <img src="<?= DEFAULT_IMAGE; ?>" class="img-thumbnail m-b-md" alt="profile">
            <?php } ?>
        </div>
        <div class="profile-info">
            <div class="">
                <div>
                    <h2 class="no-margins">
                        <?= $profile_details->first_name . ' ' . $profile_details->last_name; ?>
                    </h2>
                    <h4><?= $profile_details->twin_name; ?></h4>
                    <small>
                        <?= $profile_details->about; ?>
                    </small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <table class="table small m-b-xs">
            <tbody>
                <tr>
                    <td>
                        <strong><?= $total_counts['total_active_posts']; ?></strong> Posts
                    </td>
                    <td>
                        <strong><?= $total_counts['total_likes_for_my_posts']; ?></strong> Likes
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong><?= $total_counts['total_dislikes_for_my_posts']; ?></strong> Dislikes
                    </td>
                    <td>
                        <strong><?= $total_counts['total_comments_for_my_posts']; ?></strong> Comments
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong><?= $total_counts['user_total_albums']; ?></strong> Albums
                    </td>
                    <td>
                        <strong><?= $total_friends; ?> </strong> Friends
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!--    <div class="col-md-3">
            <small>Sales in last 24h</small>
            <h2 class="no-margins">206 480</h2>
            <div id="sparkline1"></div>
        </div>-->
</div>