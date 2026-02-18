<?php include 'header.php' ?>

<main class="container mx-auto px-4 py-8 flex-grow">
    <div class="bg-white border-4 border-black shadow-brutal overflow-hidden">
        <div class="bg-[#4ECDC4] border-b-4 border-black py-6 px-4">
            <h2 class="text-2xl font-black uppercase text-center">ค้นหาวิชาเรียน</h2>
        </div>

        <div class="p-6">
            <form action="/courses" method="get" class="mb-6">
                <div class="flex">
                    <input type="text" name="keyword" value="<?= htmlspecialchars($data['keyword']) ?>" placeholder="ค้นหาชื่อวิชาหรือรหัสวิชา" class="flex-grow py-3 px-4 border-4 border-black border-r-0 font-bold focus:outline-none">
                    <button type="submit" class="bg-[#FFE156] border-4 border-black px-6 py-3 font-bold uppercase hover:bg-[#FFD93D] transition-colors">
                        ค้นหา
                    </button>
                </div>
            </form>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php
                $enrolledCourseIds = [];
                while ($enrollment = $data['enrollments']->fetch_assoc()) {
                    $enrolledCourseIds[] = $enrollment['course_id'];
                }
                $data['enrollments']->data_seek(0);

                while ($course = $data['courses']->fetch_assoc()) {
                    $isEnrolled = in_array($course['course_id'], $enrolledCourseIds);
                    ?>
                    <div class="bg-white border-4 border-black p-4 hover:shadow-brutal transition-shadow">
                        <h3 class="text-lg font-black uppercase mb-2"><?= $course['course_name'] ?></h3>
                        <p class="font-bold mb-1">รหัสวิชา: <?= $course['course_code'] ?></p>
                        <p class="font-bold mb-4">อาจารย์: <?= $course['instructor'] ?></p>
                        <?php if ($isEnrolled) { ?>
                            <span class="block w-full bg-gray-500 text-white py-3 px-4 border-4 border-black text-center font-bold uppercase">ลงทะเบียนแล้ว</span>
                        <?php } else { ?>
                            <a href="#" onclick="showConfirmModal('ต้องการลงทะเบียนวิชานี้หรือไม่?', () => window.location.href = '/enroll/<?= $course['course_id'] ?>'); return false;" class="block w-full bg-[#4ECDC4] text-black py-3 px-4 border-4 border-black text-center font-bold uppercase hover:bg-[#3DBDB5] transition-colors">ลงทะเบียน</a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php' ?>
