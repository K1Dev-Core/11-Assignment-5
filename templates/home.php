<?php include 'header.php' ?>

<main class="container mx-auto px-4 py-8 flex-grow relative z-10">
    <?php 
    if (isset($data['message'])) {
        echo '<div class="bg-[#4ECDC4] border-4 border-black p-4 mb-4 font-bold uppercase">' . $data['message'] . '</div>';
    }
    ?>
    <div class="bg-white border-4 border-black shadow-brutal overflow-hidden mb-8">
        <div class="bg-[#FFE156] border-b-4 border-black py-6 px-4">
            <div class="text-center">
                <img src="<?= $data['student']['image'] ?>" alt="Avatar" class="w-20 h-20 mx-auto mb-4 border-4 border-black">
                <h2 class="text-2xl font-black uppercase">ยินดีต้อนรับ <?= $data['student']['first_name'] ?> <?= $data['student']['last_name'] ?></h2>
                <p class="font-bold mt-2">วันเกิด: <?= date('d/m/Y', strtotime($data['student']['date_of_birth'])) ?></p>
                <p class="font-bold">เบอร์โทรศัพท์: <?= $data['student']['phone_number'] ?></p>
                <p class="mt-4 text-lg font-black uppercase bg-white inline-block px-4 py-2 border-4 border-black">จำนวนวิชาที่ลงทะเบียน: <?= $data['enrollmentCount'] ?></p>
            </div>
        </div>
    </div>

    <div class="bg-white border-4 border-black shadow-brutal overflow-hidden">
        <div class="bg-[#4ECDC4] border-b-4 border-black py-6 px-4">
            <h2 class="text-2xl font-black uppercase text-center">วิชาที่ลงทะเบียนแล้ว</h2>
        </div>

        <div class="p-6">
            <?php if ($data['enrollments']->num_rows == 0) { ?>
                <p class="text-center font-bold uppercase">ยังไม่ได้ลงทะเบียนวิชาใดๆ</p>
            <?php } else { ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php while ($enrollment = $data['enrollments']->fetch_assoc()) { ?>
                        <div class="bg-white border-4 border-black p-4 card-brutal">
                            <h3 class="text-lg font-black uppercase mb-2"><?= $enrollment['course_name'] ?></h3>
                            <p class="font-bold mb-1">รหัสวิชา: <?= $enrollment['course_code'] ?></p>
                            <p class="font-bold mb-1">อาจารย์: <?= $enrollment['instructor'] ?></p>
                            <p class="font-bold">วันที่ลงทะเบียน: <?= $enrollment['enrollment_date'] ?></p>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</main>

<?php include 'footer.php' ?>
