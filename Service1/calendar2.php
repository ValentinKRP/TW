<?php

$daysName = array(1 => "Mon", 2 => "Tue", 3 => "Wed", 4 => "Thu", 5 => "Fri", 6 => "Sat", 7 => "Sun");

if (isset($_GET['month']) && isset($_GET['year'])) {
    $month = $_GET['month'];
    $year = $_GET['year'];
    $first = $year . "-" . $month . "-01";
    $monthName = date('M', strtotime($first));
    $firstDayName = date('D', strtotime($first));
    $daysInMonth = date('t', strtotime($year . '-' . $month . '-01'));
} else {
    $month = date('m');
    $monthName = date('M');
    $year = date('Y');
    $first = $year . "-" . $month . "-01";
    $firstDayName = date('D', strtotime($first));
    $daysInMonth = date('t', strtotime($year . '-' . $month . '-01'));
}
if ($month == 1) {
    $nextMonth = $month + 1;
    $prevMonth = 12;
    $nextYear = $year;
    $prevYear = $year - 1;
} elseif ($month == 12) {
    $nextMonth = 1;
    $prevMonth = $month - 1;
    $nextYear = $year + 1;
    $prevYear = $year;
} else {
    $nextMonth = $month + 1;
    $prevMonth = $month - 1;
    $nextYear = $year;
    $prevYear = $year;
}
?>

<body>
    <div id="calendar">
        <div class="box">
            <div class="header">
                <a class="prev" href="programare.php?month=<?= $prevMonth; ?>&amp;year=<?= $prevYear; ?>">Prev</a>
                <span class="title"><?= $year . " " . $monthName; ?></span>
                <a class="next" href="programare.php?month=<?= $nextMonth; ?>&amp;year=<?= $nextYear; ?>">Next</a>
            </div>
        </div>
        <div class="box-content">
            <ul class="label">
                <?php foreach ($daysName as $d) { ?>
                    <li class="start title title"><?= $d; ?></li>
                <?php } ?>
            </ul>
            <div class="clear"></div>
            <ul class="dates">
                <?php
                $key = array_search($firstDayName, $daysName);
                for ($i = 1; $i < 8; $i++) {
                    if ($i < $key) {
                        if ($i == 1) { ?>
                            <li id="li-" class="start mask"></li>
                        <?php } else { ?>
                            <li id="li-" class="mask"></li>
                        <?php } ?>

                        <?php } elseif ($i == $key) {
                        for ($j = 1; $j <= $daysInMonth; $j++) {
                            $yearMonthDay =  $year . "-" . $month . "-" . $j;
                            $dayName = date('D', strtotime($yearMonthDay)); ?>
                            <li id="li-<?= $yearMonthDay; ?>" class="<?php if ($dayName == 'Sun') {
                                                                            echo "end";
                                                                        } elseif ($dayName == 'Mon') {
                                                                            echo "start";
                                                                        } ?>"><?= $j; ?></li>
                <?php }
                    }
                } ?>

            </ul>
            <div class="clear"></div>
        </div>
    </div>
</body>