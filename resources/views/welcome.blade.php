<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BookCycle - ระบบบริหารการแลกเปลี่ยนหนังสือแบบหมุนเวียน</title>

        <!-- Fonts (Prompt & Plus Jakarta Sans) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-800 bg-slate-50 selection:bg-slate-800 selection:text-white">
        
        <!-- 1. Top Formal Navigation Bar -->
        <nav class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-xs">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    
                    <!-- Logo -->
                    <a href="/" class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg bg-slate-900 text-white flex items-center justify-center shadow-xs">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                                <path d="M6 6h10"/>
                                <path d="M6 10h7"/>
                            </svg>
                        </div>
                        <div class="flex flex-col text-left">
                            <span class="font-bold text-base text-slate-900 tracking-tight leading-tight">
                                BookCycle
                            </span>
                            <span class="text-[11px] text-slate-500 font-normal">
                                ระบบบริหารการแลกเปลี่ยนหนังสือ
                            </span>
                        </div>
                    </a>

                    <!-- Nav Links -->
                    <div class="hidden md:flex items-center gap-6 text-xs sm:text-sm font-medium text-slate-600">
                        <a href="#features" class="hover:text-slate-900 transition-colors">จุดเด่นของระบบ</a>
                        <a href="#how-it-works" class="hover:text-slate-900 transition-colors">ขั้นตอนการดำเนินงาน</a>
                        <a href="#books-showcase" class="hover:text-slate-900 transition-colors">คลังหนังสือในระบบ</a>
                    </div>

                    <!-- Auth Actions -->
                    <div class="flex items-center gap-2.5">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('dashboard') }}" 
                                   class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-slate-900 hover:bg-slate-800 text-white text-xs sm:text-sm font-semibold shadow-xs transition-colors">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="7" height="9" x="3" y="3" rx="1"/>
                                        <rect width="7" height="5" x="14" y="3" rx="1"/>
                                        <rect width="7" height="9" x="14" y="12" rx="1"/>
                                        <rect width="7" height="5" x="3" y="16" rx="1"/>
                                    </svg>
                                    <span>ไปยังหน้าแดชบอร์ด</span>
                                </a>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="px-3.5 py-2 rounded-lg text-xs sm:text-sm font-medium text-slate-700 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                                    เข้าสู่ระบบ
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" 
                                       class="inline-flex items-center px-4 py-2 rounded-lg bg-slate-900 hover:bg-slate-800 text-white text-xs sm:text-sm font-semibold shadow-xs transition-colors">
                                        สมัครสมาชิก
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>

                </div>
            </div>
        </nav>

        <!-- 2. Hero Section (แบบทางการและน่าเชื่อถือ) -->
        <section class="py-16 sm:py-24 bg-white border-b border-slate-200">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
                
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-semibold border border-slate-200">
                    <span class="w-2 h-2 rounded-full bg-slate-700"></span>
                    <span>แพลตฟอร์มบริหารการแลกเปลี่ยนหนังสือเพื่อชุมชนคนรักการอ่าน</span>
                </div>

                <h1 class="text-3xl sm:text-5xl font-bold text-slate-900 tracking-tight leading-tight">
                    ระบบบริหารและแลกเปลี่ยนหนังสือแบบหมุนเวียน
                </h1>

                <p class="text-sm sm:text-base text-slate-600 leading-relaxed max-w-3xl mx-auto">
                    ส่งเสริมการหมุนเวียนทรัพยากรการอ่านอย่างยั่งยืน เปลี่ยนหนังสือที่อ่านจบแล้วให้กลายเป็นประโยชน์แก่เพื่อนสมาชิก ด้วยระบบตรวจสอบการจับคู่แบบสองทาง (Two-way Match) ที่โปร่งใส มีระเบียบ และไม่มีค่าธรรมเนียม
                </p>

                <!-- CTA Buttons -->
                <div class="pt-4 flex flex-wrap items-center justify-center gap-3">
                    <a href="#books-showcase" 
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-slate-900 hover:bg-slate-800 text-white font-semibold text-xs sm:text-sm shadow-xs transition-colors">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"/>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                        <span>ค้นหาหนังสือในคลังระบบ</span>
                    </a>

                    @auth
                        <a href="{{ route('books.index') }}" 
                           class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-white hover:bg-slate-50 text-slate-800 font-semibold text-xs sm:text-sm border border-slate-300 shadow-xs transition-colors">
                            <span>รายการหนังสือของฉัน</span>
                        </a>
                    @else
                        <a href="{{ route('register') }}" 
                           class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-white hover:bg-slate-50 text-slate-800 font-semibold text-xs sm:text-sm border border-slate-300 shadow-xs transition-colors">
                            <span>ลงทะเบียนเปิดบัญชีผู้ใช้</span>
                        </a>
                    @endauth
                </div>

                <!-- Statistics Ribbon -->
                <div class="pt-8 grid grid-cols-1 sm:grid-cols-3 gap-4 max-w-3xl mx-auto text-center border-t border-slate-100">
                    <div class="p-3">
                        <div class="text-2xl font-bold text-slate-900">{{ number_format($totalBooks ?? 0) }}</div>
                        <div class="text-xs text-slate-500 mt-0.5">หนังสือในคลังระบบ (เล่ม)</div>
                    </div>
                    <div class="p-3 border-t sm:border-t-0 sm:border-x border-slate-100">
                        <div class="text-2xl font-bold text-slate-900">{{ number_format($totalUsers ?? 0) }}</div>
                        <div class="text-xs text-slate-500 mt-0.5">สมาชิกในระบบ (คน)</div>
                    </div>
                    <div class="p-3 border-t sm:border-t-0 border-slate-100">
                        <div class="text-2xl font-bold text-slate-900">{{ number_format($totalExchanges ?? 0) }}</div>
                        <div class="text-xs text-slate-500 mt-0.5">การแลกเปลี่ยนที่สำเร็จ (ครั้ง)</div>
                    </div>
                </div>

            </div>
        </section>

        <!-- 3. Key Highlights (จุดเด่นสำคัญ) -->
        <section id="features" class="py-16 sm:py-20 bg-slate-50 border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-2xl mx-auto mb-12">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">
                        SYSTEM CAPABILITIES
                    </span>
                    <h2 class="text-xl sm:text-3xl font-bold text-slate-900 mt-1.5">
                        จุดเด่นสำคัญของระบบ BookCycle
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">
                        โครงสร้างสารสนเทศที่ออกแบบมาเพื่ออำนวยความสะดวกในการบริหารจัดการหนังสือ
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    
                    {{-- 1. หนังสือหมุนเวียน --}}
                    <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-xs flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center mb-4">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                                    <path d="M6 6h10"/>
                                    <path d="M6 10h10"/>
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-slate-900">
                                1. การหมุนเวียนทรัพยากรการอ่าน
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                                ส่งเสริมการใช้ทรัพยากรหนังสืออย่างคุ้มค่า ลดภาระค่าใช้จ่ายในการจัดซื้อหนังสือเล่มใหม่ และสร้างเครือข่ายแบ่งปันความรู้ระหว่างสมาชิก
                            </p>
                        </div>
                        <div class="mt-6 pt-3 border-t border-slate-100 text-xs text-slate-500 font-medium">
                            การบริหารจัดการอย่างยั่งยืน
                        </div>
                    </div>

                    {{-- 2. Smart Matching --}}
                    <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-xs flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center mb-4">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 18l6-6-6-6"/>
                                    <circle cx="6" cy="12" r="3"/>
                                    <circle cx="18" cy="12" r="3"/>
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-slate-900">
                                2. การจับคู่แบบอัตโนมัติ (Automated Matching)
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                                อัลกอริทึมจับคู่ความต้องการแบบสองทาง (Two-way Match) และระบบจับคู่แบบวงแหวน (Multi-party Trade Ring) เพื่อช่วยให้ได้หนังสือตรงใจแม่นยำ
                            </p>
                        </div>
                        <div class="mt-6 pt-3 border-t border-slate-100 text-xs text-slate-500 font-medium">
                            จับคู่ตรงตามเงื่อนไขที่กำหนด
                        </div>
                    </div>

                    {{-- 3. โปร่งใสและมีระเบียบ --}}
                    <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-xs flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center mb-4">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-slate-900">
                                3. ความโปร่งใสและการติดตามสถานะ
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                                ทุกขั้นตอนการส่งคำขอ อนุมัติ หรือปฏิเสธ มีการบันทึกประวัติอย่างชัดเจน พร้อมระบบข้อความติดต่อสื่อสารระหว่างคู่แลกเปลี่ยนอย่างปลอดภัย
                            </p>
                        </div>
                        <div class="mt-6 pt-3 border-t border-slate-100 text-xs text-slate-500 font-medium">
                            มีระบบตรวจสอบและรายงานปัญหา
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- 4. How It Works (ขั้นตอนการใช้งาน) -->
        <section id="how-it-works" class="py-16 sm:py-20 bg-white border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-2xl mx-auto mb-12">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">
                        WORKFLOW
                    </span>
                    <h2 class="text-xl sm:text-3xl font-bold text-slate-900 mt-1.5">
                        ขั้นตอนการแลกเปลี่ยนหนังสือ
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">
                        กระบวนการดำเนินงานอย่างเป็นขั้นตอน สะดวก และตรวจสอบได้
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    
                    {{-- Step 1 --}}
                    <div class="bg-slate-50 rounded-xl p-6 border border-slate-200">
                        <div class="w-8 h-8 rounded bg-slate-900 text-white font-bold text-sm flex items-center justify-center mb-4">
                            1
                        </div>
                        <h4 class="font-bold text-base text-slate-900">บันทึกข้อมูลหนังสือ</h4>
                        <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                            ลงทะเบียนข้อมูลหนังสือที่คุณอ่านจบแล้ว ระบุชื่อเรื่อง ผู้แต่ง สภาพหนังสือ และอัปโหลดภาพถ่ายจริง
                        </p>
                    </div>

                    {{-- Step 2 --}}
                    <div class="bg-slate-50 rounded-xl p-6 border border-slate-200">
                        <div class="w-8 h-8 rounded bg-slate-900 text-white font-bold text-sm flex items-center justify-center mb-4">
                            2
                        </div>
                        <h4 class="font-bold text-base text-slate-900">ระบุรายการที่ต้องการ</h4>
                        <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                            บันทึกรายชื่อหนังสือที่คุณกำลังตามหา เพื่อให้ระบบจับคู่เข้ากับคลังหนังสือของสมาชิกท่านอื่น
                        </p>
                    </div>

                    {{-- Step 3 --}}
                    <div class="bg-slate-50 rounded-xl p-6 border border-slate-200">
                        <div class="w-8 h-8 rounded bg-slate-900 text-white font-bold text-sm flex items-center justify-center mb-4">
                            3
                        </div>
                        <h4 class="font-bold text-base text-slate-900">จับคู่และยืนยันการแลก</h4>
                        <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                            เมื่อพบคู่แลกเปลี่ยนที่ตรงกัน ส่งคำขอแลกเปลี่ยนและสื่อสารเพื่อส่งมอบหนังสือให้แก่กันอย่างปลอดภัย
                        </p>
                    </div>

                </div>

            </div>
        </section>

        <!-- 5. คลังหนังสือในระบบ (Books Showcase) -->
        <section id="books-showcase" class="py-16 sm:py-20 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500">
                            CATALOG SHOWCASE
                        </span>
                        <h2 class="text-xl sm:text-3xl font-bold text-slate-900 mt-1">
                            หนังสือที่พร้อมให้แลกเปลี่ยนในระบบ
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-500 mt-1">
                            ตัวอย่างรายการหนังสือที่ลงทะเบียนโดยสมาชิกและพร้อมหมุนเวียน
                        </p>
                    </div>

                    <a href="{{ route('register') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-slate-900 hover:underline">
                        <span>ลงทะเบียนเพื่อเริ่มต้นแลกเปลี่ยน</span> <span>→</span>
                    </a>
                </div>

                @if(isset($featuredBooks) && $featuredBooks->count() > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 sm:gap-6">
                        @foreach($featuredBooks as $fBook)
                            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-xs hover:border-slate-300 transition-all flex flex-col group">
                                
                                {{-- Cover --}}
                                <div class="relative aspect-[3/4] bg-slate-100 overflow-hidden">
                                    @if($fBook->image)
                                        <img src="{{ asset('storage/' . $fBook->image) }}" 
                                             alt="{{ $fBook->title }}" 
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center bg-slate-100 text-slate-400">
                                            <svg class="w-8 h-8 text-slate-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                                                <path d="M6 6h10"/>
                                                <path d="M6 10h10"/>
                                            </svg>
                                            <span class="text-[10px] text-slate-400 mt-1 font-medium">ไม่มีรูปปก</span>
                                        </div>
                                    @endif

                                    <div class="absolute top-2 right-2">
                                        <span class="px-2 py-0.5 rounded bg-emerald-700 text-white text-[10px] font-semibold">
                                            พร้อมแลก
                                        </span>
                                    </div>

                                    @if($fBook->condition)
                                        <div class="absolute top-2 left-2">
                                            <span class="px-2 py-0.5 rounded bg-slate-900/80 text-white text-[10px] font-medium">
                                                {{ $fBook->condition }}
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                {{-- Details --}}
                                <div class="p-3.5 flex-1 flex flex-col justify-between">
                                    <div>
                                        <h4 class="font-semibold text-xs sm:text-sm text-slate-900 line-clamp-1 leading-snug" title="{{ $fBook->title }}">
                                            {{ $fBook->title }}
                                        </h4>
                                        <p class="text-[11px] text-slate-500 truncate mt-0.5">
                                            {{ $fBook->author ?? 'ไม่ระบุผู้แต่ง' }}
                                        </p>
                                    </div>

                                    <div class="mt-3 pt-2.5 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                                        <span>สมาชิก: {{ $fBook->user->name ?? '-' }}</span>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white rounded-xl border border-slate-200 p-12 text-center text-slate-500">
                        <svg class="w-12 h-12 text-slate-300 mx-auto mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                            <path d="M6 6h10"/>
                            <path d="M6 10h10"/>
                        </svg>
                        <h3 class="font-semibold text-sm text-slate-800">ยังไม่มีหนังสือในคลังระบบ</h3>
                        <p class="text-xs text-slate-400 mt-1">เริ่มต้นลงทะเบียนหนังสือเล่มแรกในระบบได้แล้ววันนี้</p>
                        <a href="{{ route('register') }}" class="inline-flex items-center mt-4 px-4 py-2 rounded-lg bg-slate-900 text-white text-xs font-semibold shadow-xs">
                            สมัครสมาชิกเพื่อลงหนังสือ
                        </a>
                    </div>
                @endif

            </div>
        </section>

        <!-- 6. Formal CTA Banner -->
        <section class="py-14 bg-slate-900 text-white text-center">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
                <h2 class="text-xl sm:text-3xl font-bold tracking-tight">
                    เริ่มต้นใช้งานระบบ BookCycle ได้แล้ววันนี้
                </h2>
                <p class="text-xs sm:text-sm text-slate-300 max-w-xl mx-auto leading-relaxed">
                    สร้างบัญชีผู้ใช้เพื่อลงทะเบียนหนังสือที่คุณต้องการส่งต่อ หรือค้นหาหนังสือเล่มใหม่ที่คุณสนใจ
                </p>
                <div class="pt-2">
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-white text-slate-900 font-semibold text-xs sm:text-sm shadow-xs hover:bg-slate-100 transition-colors">
                        <span>ลงทะเบียนสมาชิกใหม่</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- 7. Formal Institutional Footer -->
        <footer class="bg-white border-t border-slate-200 py-8 text-slate-500 text-xs">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-7 h-7 rounded bg-slate-800 text-white flex items-center justify-center">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                                <path d="M6 6h10"/>
                                <path d="M6 10h7"/>
                            </svg>
                        </div>
                        <div>
                            <span class="font-bold text-slate-900 text-sm">BookCycle Platform</span>
                            <span class="text-slate-400 hidden sm:inline"> | ระบบบริหารการแลกเปลี่ยนหนังสือแบบหมุนเวียน</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-6">
                        <a href="{{ route('login') }}" class="hover:text-slate-900 transition-colors">เข้าสู่ระบบ</a>
                        <a href="{{ route('register') }}" class="hover:text-slate-900 transition-colors">สมัครสมาชิก</a>
                    </div>
                </div>

                <div class="mt-6 pt-6 border-t border-slate-100 text-center text-slate-400">
                    © {{ date('Y') }} BookCycle. สงวนลิขสิทธิ์ตามกฎหมาย.
                </div>
            </div>
        </footer>

    </body>
</html>
