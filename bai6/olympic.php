<?php
class Country {
    public $name;
    public $totalGoldMedals;

    public function __construct($name, $totalGoldMedals) {
        $this->name = $name;
        $this->totalGoldMedals = $totalGoldMedals;
    }
}

// Tạo danh sách các quốc gia
$countries = array(
    new Country("Hoa Kỳ", 10),
    new Country("Nga", 5),
    new Country("Việt Nam", 15),
    new Country("Trung Quốc", 8),
    new Country("Anh", 2),
    // Thêm các quốc gia khác vào đây
);

// Sắp xếp theo tổng số huy chương vàng giảm dần
usort($countries, function($a, $b) {
    return $b->totalGoldMedals - $a->totalGoldMedals;
});

// In ra thứ hạng các quốc gia
foreach ($countries as $index => $country) {
    $rank = $index + 1;
    echo "Thứ hạng $rank: $country->name - $country->totalGoldMedals huy chương vàng\n";
    echo "<br>";
}