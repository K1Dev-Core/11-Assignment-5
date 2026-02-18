    <footer class="bg-black text-white py-4 mt-8 border-t-4 border-[#FFE156] relative z-10">
        <div class="container mx-auto px-4 text-center">
            <p class="text-sm font-bold uppercase hover:text-[#FFE156] transition-colors cursor-default">&copy; 2026 ระบบลงทะเบียนเรียน. All rights reserved.</p>
        </div>
    </footer>

    <div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-white p-6 border-4 border-black max-w-sm w-full mx-4 shadow-brutal animate-bounce-in">
            <p id="confirmMessage" class="mb-4 text-lg font-bold"></p>
            <div class="flex justify-end space-x-2">
                <button id="confirmNo" class="px-4 py-2 bg-white border-4 border-black font-bold uppercase btn-brutal">ยกเลิก</button>
                <button id="confirmYes" class="px-4 py-2 bg-[#4ECDC4] border-4 border-black font-bold uppercase btn-brutal">ยืนยัน</button>
            </div>
        </div>
    </div>

    <script>
        function showConfirmModal(message, yesCallback) {
            const modal = document.getElementById('confirmModal');
            const modalContent = modal.querySelector('div');
            document.getElementById('confirmMessage').textContent = message;
            modal.classList.remove('hidden');
            modalContent.classList.remove('animate-bounce-in');
            void modalContent.offsetWidth;
            modalContent.classList.add('animate-bounce-in');
            document.getElementById('confirmYes').onclick = () => {
                yesCallback();
                modal.classList.add('hidden');
            };
            document.getElementById('confirmNo').onclick = () => {
                modal.classList.add('hidden');
            };
            modal.onclick = (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            };
        }
    </script>
</body>
</html>
