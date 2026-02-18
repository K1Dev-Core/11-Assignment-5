<?php include 'header.php' ?>

<main class="container mx-auto px-4 py-8 flex-grow relative z-10">
    <div class="bg-white border-4 border-black shadow-brutal overflow-hidden max-w-md mx-auto relative">
        <button onclick="toggleDebugModal()" class="absolute top-4 right-4 bg-[#FFE156] border-4 border-black p-2 btn-brutal" title="Debug">
            <i class="fas fa-bug text-lg"></i>
        </button>
        <div class="bg-[#FFE156] border-b-4 border-black py-6 px-4">
            <h2 class="text-2xl font-black uppercase text-center">เข้าสู่ระบบ</h2>
        </div>

        <div class="p-6">
            <form action="/login" method="post" id="loginForm">
                <?php if (isset($data['error'])) { ?>
                    <div class="bg-[#FF6B6B] border-4 border-black p-4 mb-4 font-bold">
                        <?= $data['error'] ?>
                    </div>
                <?php } ?>
                <div class="mb-4">
                    <label for="email" class="block font-bold uppercase mb-2">อีเมล</label>
                    <input type="email" name="email" id="email"
                        class="w-full py-3 px-4 border-4 border-black font-bold focus:outline-none focus:border-[#4ECDC4]"
                        required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block font-bold uppercase mb-2">รหัสผ่าน</label>
                    <input type="password" name="password" id="password"
                        class="w-full py-3 px-4 border-4 border-black font-bold focus:outline-none focus:border-[#4ECDC4]"
                        required>
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit"
                        class="bg-[#4ECDC4] border-4 border-black px-8 py-3 font-bold uppercase btn-brutal">
                        เข้าสู่ระบบ
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="debugModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white border-4 border-black shadow-brutal max-w-sm w-full mx-4">
            <div class="bg-[#FFE156] border-b-4 border-black py-4 px-4 flex justify-between items-center">
                <h3 class="text-xl font-black uppercase">Debug - ข้อมูลทดสอบ</h3>
                <button onclick="document.getElementById('debugModal').classList.add('hidden')" class="bg-white border-4 border-black px-2 py-1 font-bold btn-brutal">×</button>
            </div>
            <div class="p-4 space-y-2">
                <button onclick="fillLogin('alice@example.com', 'password')" class="w-full bg-white border-4 border-black p-3 font-bold text-left btn-brutal">
                    <i class="fas fa-user mr-2"></i>alice@example.com
                </button>
                <button onclick="fillLogin('bob@example.com', 'password')" class="w-full bg-white border-4 border-black p-3 font-bold text-left btn-brutal">
                    <i class="fas fa-user mr-2"></i>bob@example.com
                </button>
                <button onclick="fillLogin('charlie@example.com', 'password')" class="w-full bg-white border-4 border-black p-3 font-bold text-left btn-brutal">
                    <i class="fas fa-user mr-2"></i>charlie@example.com
                </button>
                <button onclick="fillLogin('david@example.com', 'password')" class="w-full bg-white border-4 border-black p-3 font-bold text-left btn-brutal">
                    <i class="fas fa-user mr-2"></i>david@example.com
                </button>
                <button onclick="fillLogin('emily@example.com', 'password')" class="w-full bg-white border-4 border-black p-3 font-bold text-left btn-brutal">
                    <i class="fas fa-user mr-2"></i>emily@example.com
                </button>
            </div>
        </div>
    </div>

    <script>
        function toggleDebugModal() {
            const modal = document.getElementById('debugModal');
            modal.classList.toggle('hidden');
        }
        
        function fillLogin(email, password) {
            document.getElementById('email').value = email;
            document.getElementById('password').value = password;
            document.getElementById('debugModal').classList.add('hidden');

        }
        
        document.getElementById('debugModal').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
    </script>
</main>

<?php include 'footer.php' ?>