 
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>CVVEN</title>
    <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $('.month').hide();
            $('.month:first').show();
            $('.months a:first').addClass('active');
            var current = 1;
            $('.months a').click(function() {
                var month = $(this).attr('id').replace('month', '');
                if (month !== current) {
                    $('#Month' + current).slideUp();
                    $('#Month' + month).slideDown();
                    $('.months a#month' + current).removeClass('active');
                    $('.months a#month' + month).addClass('active');
                    current = month;
                }
                return false;
            });
        });
    </script>

    <?php
    include_once 'user.php';
    $u = new user();
    require 'header.php';

    require_once 'calendrier.php';
    require_once 'config.php';
    $year = 2014;
    $ve = new calendrier();
    $events = $ve->getEvents($year);
    $vac = array();
    $dates = $ve->getAll($year);
    ?>
    <?php if (isset($_SESSION['nom'])) { ?>
    <div id="intro">
        <h2>Calendrier de réservation séjour</h2>
        <p>Vous pourrez voir les disponilités pour les séjours.</p><br/>
    </div>
    <div class="period">
        <div class='year'><?php echo $year; ?></div>
        <div class='months'>
            <ul>
                <?php foreach ($ve->months as $id => $mo): ?>
                    <li><a href="#" id="month<?php echo $id + 1; ?>"><?php echo utf8_encode(substr(utf8_decode($mo), 0, 3)); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="clear"></div>
        <?php $dates = current($dates);
        foreach ($dates as $m => $j):
            ?>
            <div class="month" id="Month<?php echo $m; ?>">
                <table>
                    <thead>
                        <tr>
                            <?php foreach ($ve->days as $d): ?>
                                <th><?php echo substr($d, 0, 3); ?></th>
        <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $end = end($j);
                            foreach ($j as $d => $w): ?>
                                <?php $time = strtotime("$year-$m-$d");
                                if ($d == 1): ?>
                                    <td colspan="<?php echo $w - 1; ?>" class="padding"></td>
                                            <?php endif; ?>
                                <td><div>
                                        <p class="events">
                                            <?php
                                            if (isset($events[$time])) {
                                                $D = $d;
                                                $M = $m;
                                                $Y = $year;
                                                $tps = $time;
                                                // echo date('Y-m-j', $events[$time]);
                                                //echo date('Y-m-j', $time);
                                                while ($time <= $events[$tps]) {
                                                    $vac[$D . $M . $Y] = $time;

                                                    $time = $time + 24 * 3600;
                                                    $dr = date('Y-m-j', $time);
                                                    $parts = explode("-", $dr);

                                                    $D = $parts[2];
                                                    $M = $parts[1];
                                                    $Y = $parts[0];
                                                    //echo $D."/".$M."/".$Y." ";
                                                }

                                                $time = $tps;
                                                if (isset($vac[$d . $m . $year]) && $vac[$d . $m . $year] == $time) {
                                                    $color = "green";
                                                }
                                            }
                                            if (!isset($vac[$d . $m . $year])) {
                                                $vac[$d . $m . $year] = '';
                                            } elseif (isset($vac[$d . $m . $year]) && $vac[$d . $m . $year] == $time) {
                                                $color = "green";
                                            } else {
                                                $color = '';
                                            }
                                            ?>

                                        </p>
                                        <div class="day" style="background-color: <?php if (isset($color)) echo $color; ?>"><?php echo $d; ?></div>

                                    </div>
                                </td>
            <?php if ($w == 7): ?>
                                <tr></tr>
            <?php endif; ?>
            <?php endforeach;
            if ($end != 7):
                ?>
                        <td colspan="<?php echo 7 - $end; ?>" class="padding"></td>
        <?php endif; ?>
                    </tr>
                    </tbody>
                </table>
            </div>
    <?php endforeach ?> 
    </div>
<?php }else { ?>
    <p>Veuillez vous connectez pour voir les disponibilités.</p>
<?php } ?>
<div class="clear"></div>
<?php require 'footer.php'; ?>
            