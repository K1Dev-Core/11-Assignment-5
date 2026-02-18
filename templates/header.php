<?php
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบลงทะเบียนเรียน</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    boxShadow: {
                        'brutal': '4px 4px 0px 0px #000',
                        'brutal-sm': '2px 2px 0px 0px #000',
                        'brutal-lg': '6px 6px 0px 0px #000',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delay': 'float 6s ease-in-out 2s infinite',
                        'pulse-brutal': 'pulse-brutal 0.3s ease-in-out',
                        'shake': 'shake 0.5s ease-in-out',
                        'bounce-in': 'bounce-in 0.5s ease-out',
                        'slide-up': 'slide-up 0.4s ease-out',
                        'wiggle': 'wiggle 0.3s ease-in-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        'pulse-brutal': {
                            '0%': { transform: 'scale(1)' },
                            '50%': { transform: 'scale(0.95)' },
                            '100%': { transform: 'scale(1)' },
                        },
                        shake: {
                            '0%, 100%': { transform: 'translateX(0)' },
                            '25%': { transform: 'translateX(-5px)' },
                            '75%': { transform: 'translateX(5px)' },
                        },
                        'bounce-in': {
                            '0%': { transform: 'scale(0.3)', opacity: '0' },
                            '50%': { transform: 'scale(1.05)' },
                            '70%': { transform: 'scale(0.9)' },
                            '100%': { transform: 'scale(1)', opacity: '1' },
                        },
                        'slide-up': {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(0deg)' },
                            '25%': { transform: 'rotate(-3deg)' },
                            '75%': { transform: 'rotate(3deg)' },
                        },
                    }
                }
            }
        }
    </script>
    <style>
        .btn-brutal {
            transition: all 0.15s ease;
        }
        .btn-brutal:hover {
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0px 0px #000;
        }
        .btn-brutal:active {
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0px 0px #000;
        }
        .card-brutal {
            transition: all 0.2s ease;
        }
        .card-brutal:hover {
            transform: translate(-4px, -4px);
            box-shadow: 8px 8px 0px 0px #000;
        }
        .bg-animated {
            background-color: #FFF8E7;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(78, 205, 196, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 225, 86, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(255, 107, 107, 0.1) 0%, transparent 50%);
        }
        .floating-shape {
            position: fixed;
            border: 4px solid black;
            pointer-events: none;
            z-index: 0;
            opacity: 0.3;
        }
        .shape-1 {
            width: 60px;
            height: 60px;
            background: #FFE156;
            top: 15%;
            left: 5%;
            animation: float 8s ease-in-out infinite;
        }
        .shape-2 {
            width: 40px;
            height: 40px;
            background: #4ECDC4;
            border-radius: 50%;
            top: 60%;
            right: 8%;
            animation: float 10s ease-in-out 2s infinite;
        }
        .shape-3 {
            width: 80px;
            height: 80px;
            background: #FF6B6B;
            top: 80%;
            left: 15%;
            transform: rotate(45deg);
            animation: float 12s ease-in-out 4s infinite;
        }
        .shape-4 {
            width: 30px;
            height: 30px;
            background: #FFE156;
            border-radius: 50%;
            top: 30%;
            right: 20%;
            animation: float 9s ease-in-out 1s infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(var(--rotate, 0deg)); }
            50% { transform: translateY(-30px) rotate(var(--rotate, 0deg)); }
        }
        .input-brutal:focus {
            animation: wiggle 0.3s ease-in-out;
        }
        .page-enter {
            animation: slide-up 0.4s ease-out;
        }
        .icon-spin:hover i {
            animation: spin 0.5s ease-in-out;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-animated min-h-screen flex flex-col relative overflow-x-hidden">
    <div class="floating-shape shape-1"></div>
    <div class="floating-shape shape-2"></div>
    <div class="floating-shape shape-3"></div>
    <div class="floating-shape shape-4"></div>
    
    <header class="bg-[#FFE156] border-b-4 border-black sticky top-0 z-50 relative">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-xl sm:text-2xl font-black uppercase tracking-wide animate-bounce-in"><i class="fas fa-graduation-cap mr-2"></i><span class="hidden sm:inline">ระบบลงทะเบียนเรียน</span><span class="sm:hidden">ลงทะเบียน</span></h1>
                <button id="mobileMenuBtn" class="md:hidden bg-white border-4 border-black px-3 py-2 font-bold btn-brutal">
                    <i class="fas fa-bars text-lg"></i>
                </button>
                <nav id="mainNav" class="hidden md:flex gap-3">
                    <a href="/" class="px-4 py-2 bg-white border-4 border-black font-bold uppercase text-sm btn-brutal <?= $currentPath == '/' ? 'bg-[#4ECDC4]' : '' ?>"><i class="fas fa-home mr-1"></i><span class="hidden lg:inline">หน้าหลัก</span><span class="lg:hidden">หน้า</span></a>
                    <?php if (isset($_SESSION['student_id'])): ?>
                    <a href="/courses" class="px-4 py-2 bg-white border-4 border-black font-bold uppercase text-sm btn-brutal <?= $currentPath == '/courses' ? 'bg-[#4ECDC4]' : '' ?>"><i class="fas fa-book mr-1"></i><span class="hidden lg:inline">วิชาเรียน</span><span class="lg:hidden">วิชา</span></a>
                    <a href="/enrolled" class="px-4 py-2 bg-white border-4 border-black font-bold uppercase text-sm btn-brutal <?= $currentPath == '/enrolled' ? 'bg-[#4ECDC4]' : '' ?>"><i class="fas fa-list mr-1"></i><span class="hidden lg:inline">ลงทะเบียนแล้ว</span><span class="lg:hidden">ลงแล้ว</span></a>
                    <a href="#" onclick="showConfirmModal('ต้องการออกจากระบบหรือไม่?', () => window.location.href = '/logout'); return false;" class="px-4 py-2 bg-[#FF6B6B] border-4 border-black font-bold uppercase text-sm btn-brutal"><i class="fas fa-sign-out-alt mr-1"></i><span class="hidden lg:inline">ออกจากระบบ</span><span class="lg:hidden">ออก</span></a>
                    <?php endif; ?>
                </nav>
            </div>
            <nav id="mobileNav" class="hidden md:hidden mt-4 space-y-2">
                <a href="/" class="block py-3 px-4 bg-white border-4 border-black font-bold uppercase btn-brutal <?= $currentPath == '/' ? 'bg-[#4ECDC4]' : '' ?>"><i class="fas fa-home mr-2"></i>หน้าหลัก</a>
                <?php if (isset($_SESSION['student_id'])): ?>
                <a href="/courses" class="block py-3 px-4 bg-white border-4 border-black font-bold uppercase btn-brutal <?= $currentPath == '/courses' ? 'bg-[#4ECDC4]' : '' ?>"><i class="fas fa-book mr-2"></i>วิชาเรียน</a>
                <a href="/enrolled" class="block py-3 px-4 bg-white border-4 border-black font-bold uppercase btn-brutal <?= $currentPath == '/enrolled' ? 'bg-[#4ECDC4]' : '' ?>"><i class="fas fa-list mr-2"></i>ลงทะเบียนแล้ว</a>
                <a href="#" onclick="showConfirmModal('ต้องการออกจากระบบหรือไม่?', () => window.location.href = '/logout'); return false;" class="block py-3 px-4 bg-[#FF6B6B] border-4 border-black font-bold uppercase btn-brutal"><i class="fas fa-sign-out-alt mr-2"></i>ออกจากระบบ</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <script>
        document.getElementById('mobileMenuBtn')?.addEventListener('click', function() {
            const mobileNav = document.getElementById('mobileNav');
            mobileNav?.classList.toggle('hidden');
        });
    </script>
