<?php include 'header.php' ?>

<main class="container mx-auto px-4 py-8 flex-grow">
    <?php if (isset($data['message'])) { ?>
        <div class="bg-[#4ECDC4] border-4 border-black p-4 mb-4 font-bold uppercase">
            <?= $data['message'] ?>
        </div>
    <?php } ?>
    <div class="bg-white border-4 border-black shadow-brutal overflow-hidden">
        <div class="bg-[#FFE156] border-b-4 border-black py-6 px-4">
            <h2 class="text-2xl font-black uppercase text-center">วิชาที่ลงทะเบียนแล้ว</h2>
        </div>

        <div class="p-6">
            <?php if ($data['enrollments']->num_rows == 0) { ?>
                <p class="text-center font-bold uppercase">ยังไม่ได้ลงทะเบียนวิชาใดๆ</p>
            <?php } else { ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php while ($enrollment = $data['enrollments']->fetch_assoc()) { ?>
                        <div class="bg-white border-4 border-black p-4 hover:shadow-brutal transition-shadow">
                            <h3 class="text-lg font-black uppercase mb-2"><?= $enrollment['course_name'] ?></h3>
                            <p class="font-bold mb-1">รหัสวิชา: <?= $enrollment['course_code'] ?></p>
                            <p class="font-bold mb-1">อาจารย์: <?= $enrollment['instructor'] ?></p>
                            <p class="font-bold mb-4">วันที่ลงทะเบียน: <?= $enrollment['enrollment_date'] ?></p>
                            <a href="#" onclick="showConfirmModal('ต้องการถอนวิชานี้หรือไม่?', () => window.location.href = '/withdraw/<?= $enrollment['course_id'] ?>'); return false;" class="block w-full bg-[#FF6B6B] text-black py-3 px-4 border-4 border-black text-center font-bold uppercase hover:bg-[#FF5252] transition-colors">ถอนวิชา</a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</main>

<?php include 'footer.php' ?>
