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
    <body class="font-sans antialiased text-slate-800 bg-[#f6f3fa] selection:bg-violet-800 selection:text-white">
        
        <!-- 1. Top Formal Navigation Bar -->
        <nav class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-xs">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    
                    <!-- Logo -->
                    <a href="/" class="flex items-center gap-3">
                        <img src="{{ asset('images/logo-icon.png') }}" alt="BookCycle" class="w-9 h-9 object-contain shrink-0">
                        <div class="flex flex-col text-left">
                            <span class="font-bold text-base text-slate-900 tracking-tight leading-tight">
                                BookCycle
                            </span>
                            <span class="text-[11px] text-slate-500 font-normal">
                                ระบบบริหารการแลกเปลี่ยนหนังสือแบบหมุนเวียน
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
                                   class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-violet-700 hover:bg-violet-800 text-white text-xs sm:text-sm font-semibold shadow-xs transition-colors">
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
                                       class="inline-flex items-center px-4 py-2 rounded-lg bg-violet-700 hover:bg-violet-800 text-white text-xs sm:text-sm font-semibold shadow-xs transition-colors">
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
        <section class="home-hero py-16 sm:py-24 border-b border-violet-100">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
                
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/80 text-violet-800 text-xs font-semibold border border-violet-200">
                    <span class="w-2 h-2 rounded-full bg-violet-600"></span>
                    <span>แพลตฟอร์มบริหารการแลกเปลี่ยนหนังสือเพื่อชุมชนคนรักการอ่าน</span>
                </div>

                <h1 class="text-3xl sm:text-5xl font-bold text-violet-950 tracking-tight leading-tight">
                    ระบบบริหารและแลกเปลี่ยนหนังสือแบบหมุนเวียน
                </h1>

                <p class="text-sm sm:text-base text-slate-600 leading-relaxed max-w-3xl mx-auto">
                    ส่งเสริมการหมุนเวียนทรัพยากรการอ่านอย่างยั่งยืน เปลี่ยนหนังสือที่อ่านจบแล้วให้กลายเป็นประโยชน์แก่เพื่อนสมาชิก ด้วยระบบตรวจสอบการจับคู่แบบสองทาง (Two-way Match) ที่โปร่งใส มีระเบียบ และไม่มีค่าธรรมเนียม
                </p>

                <!-- CTA Buttons -->
                <div class="pt-4 flex flex-wrap items-center justify-center gap-3">
                    <a href="#books-showcase" 
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-violet-700 hover:bg-violet-800 text-white font-semibold text-xs sm:text-sm shadow-md transition-colors">
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
                    <div class="hero-metric p-3">
                        <strong class="text-2xl font-bold">{{ number_format($totalBooks ?? 0) }}</strong>
                        <div class="text-xs text-slate-500 mt-0.5">หนังสือในคลังระบบ (เล่ม)</div>
                    </div>
                    <div class="hero-metric p-3 border-t sm:border-t-0 sm:border-x border-slate-100">
                        <strong class="text-2xl font-bold">{{ number_format($totalUsers ?? 0) }}</strong>
                        <div class="text-xs text-slate-500 mt-0.5">สมาชิกในระบบ (คน)</div>
                    </div>
                    <div class="hero-metric p-3 border-t sm:border-t-0 border-slate-100">
                        <strong class="text-2xl font-bold">{{ number_format($totalExchanges ?? 0) }}</strong>
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
                    <div class="feature-tile bg-white rounded-xl p-6 border border-slate-200 shadow-xs flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-violet-50 text-violet-700 ring-1 ring-violet-100 flex items-center justify-center mb-4">
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
                    <div class="feature-tile bg-white rounded-xl p-6 border border-slate-200 shadow-xs flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-sky-50 text-sky-700 ring-1 ring-sky-100 flex items-center justify-center mb-4">
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
                    <div class="feature-tile bg-white rounded-xl p-6 border border-slate-200 shadow-xs flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-700 ring-1 ring-amber-100 flex items-center justify-center mb-4">
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
                    <div class="workflow-step bg-violet-50/70 rounded-xl p-6 border border-violet-100">
                        <div class="w-8 h-8 rounded bg-violet-700 text-white font-bold text-sm flex items-center justify-center mb-4">
                            1
                        </div>
                        <h4 class="font-bold text-base text-slate-900">บันทึกข้อมูลหนังสือ</h4>
                        <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                            ลงทะเบียนข้อมูลหนังสือที่คุณอ่านจบแล้ว ระบุชื่อเรื่อง ผู้แต่ง สภาพหนังสือ และอัปโหลดภาพถ่ายจริง
                        </p>
                    </div>

                    {{-- Step 2 --}}
                    <div class="workflow-step bg-sky-50/70 rounded-xl p-6 border border-sky-100">
                        <div class="w-8 h-8 rounded bg-sky-700 text-white font-bold text-sm flex items-center justify-center mb-4">
                            2
                        </div>
                        <h4 class="font-bold text-base text-slate-900">ระบุรายการที่ต้องการ</h4>
                        <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                            บันทึกรายชื่อหนังสือที่คุณกำลังตามหา เพื่อให้ระบบจับคู่เข้ากับคลังหนังสือของสมาชิกท่านอื่น
                        </p>
                    </div>

                    {{-- Step 3 --}}
                    <div class="workflow-step bg-amber-50/70 rounded-xl p-6 border border-amber-100">
                        <div class="w-8 h-8 rounded bg-amber-600 text-white font-bold text-sm flex items-center justify-center mb-4">
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
        <section id="books-showcase" 
                 x-data="{ 
                     modalOpen: false, 
                     activeBook: null,
                     openDetail(book) {
                         this.activeBook = book;
                         this.modalOpen = true;
                     }
                 }" 
                 class="py-16 sm:py-20 bg-slate-50 relative">
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
                            คลิกที่รายการหนังสือเพื่อดูรายละเอียด (โหมดผู้เยี่ยมชม: ดูได้อย่างเดียว)
                        </p>
                    </div>

                    <a href="{{ route('register') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-slate-900 hover:underline">
                        <span>ลงทะเบียนเพื่อเริ่มต้นแลกเปลี่ยน</span> <span>→</span>
                    </a>
                </div>

                @if(isset($featuredBooks) && $featuredBooks->count() > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 sm:gap-6">
                        @foreach($featuredBooks as $fBook)
                            @php
                                $bookData = [
                                    'id' => $fBook->id,
                                    'title' => $fBook->title,
                                    'author' => $fBook->author ?? 'ไม่ระบุผู้แต่ง',
                                    'category' => $fBook->category ?? 'ทั่วไป',
                                    'condition' => $fBook->condition ?? 'สภาพดี',
                                    'status' => $fBook->status,
                                    'description' => $fBook->description ?: 'เจ้าของหนังสือไม่ได้ระบุรายละเอียดเพิ่มเติม',
                                    'image' => $fBook->image ? asset('storage/' . $fBook->image) : null,
                                    'user_name' => $fBook->user->name ?? 'สมาชิก BookCycle',
                                    'show_url' => route('books.show', $fBook),
                                ];
                            @endphp
                            <div @click="openDetail({{ json_encode($bookData) }})"
                                 class="book-tile bg-white rounded-xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-lg hover:-translate-y-1 transition-all duration-200 flex flex-col group cursor-pointer relative">
                                
                                {{-- Cover --}}
                                <div class="relative aspect-[3/4] bg-slate-100 overflow-hidden">
                                    @if($fBook->image)
                                        <img src="{{ asset('storage/' . $fBook->image) }}" 
                                             alt="{{ $fBook->title }}" 
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                             onerror="this.onerror=null; this.src='{{ asset('images/logo-icon.png') }}';">
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
                                        <span class="px-2 py-0.5 rounded bg-emerald-700 text-white text-[10px] font-semibold shadow-xs">
                                            พร้อมแลก
                                        </span>
                                    </div>

                                    @if($fBook->condition)
                                        <div class="absolute top-2 left-2">
                                            <span class="px-2 py-0.5 rounded bg-slate-900/80 text-white text-[10px] font-medium backdrop-blur-xs">
                                                {{ $fBook->condition }}
                                            </span>
                                        </div>
                                    @endif

                                    {{-- Hover Overlay Hint --}}
                                    <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none">
                                        <span class="px-3 py-1.5 rounded-lg bg-white text-slate-900 font-semibold text-xs shadow-md">
                                            🔍 ดูรายละเอียด
                                        </span>
                                    </div>
                                </div>

                                {{-- Details --}}
                                <div class="p-3.5 flex-1 flex flex-col justify-between">
                                    <div>
                                        <h4 class="font-semibold text-xs sm:text-sm text-slate-900 line-clamp-1 leading-snug group-hover:text-violet-700 transition-colors" title="{{ $fBook->title }}">
                                            {{ $fBook->title }}
                                        </h4>
                                        <p class="text-[11px] text-slate-500 truncate mt-0.5">
                                            {{ $fBook->author ?? 'ไม่ระบุผู้แต่ง' }}
                                        </p>
                                    </div>

                                    <div class="mt-3 pt-2.5 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                                        <span>สมาชิก: {{ $fBook->user->name ?? '-' }}</span>
                                        <span class="text-violet-700 font-semibold group-hover:translate-x-0.5 transition-transform">ดูข้อมูล →</span>
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

            <!-- Modal แสดงรายละเอียดหนังสือ (โหมดดูได้อย่างเดียว) -->
            <div x-show="modalOpen" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4 sm:p-6"
                 x-cloak
                 @keydown.escape.window="modalOpen = false">

                <div @click.away="modalOpen = false" 
                     x-show="modalOpen"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     class="bg-white rounded-2xl sm:rounded-3xl shadow-2xl border border-slate-200 max-w-2xl w-full overflow-hidden flex flex-col max-h-[90vh]">
                    
                    <!-- Modal Header -->
                    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                        <div class="flex items-center gap-2">
                            <span class="text-lg">📖</span>
                            <h3 class="font-bold text-base text-slate-900">
                                รายละเอียดหนังสือ
                            </h3>
                            <span class="ml-2 px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-amber-100 text-amber-800 border border-amber-200">
                                โหมดดูได้อย่างเดียว
                            </span>
                        </div>
                        <button @click="modalOpen = false" 
                                class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-slate-700 hover:bg-slate-200 transition-colors">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Modal Body (Scrollable) -->
                    <div class="p-6 overflow-y-auto flex-1">
                        <template x-if="activeBook">
                            <div class="flex flex-col sm:flex-row gap-6">
                                <!-- Book Cover -->
                                <div class="w-full sm:w-48 shrink-0 flex flex-col items-center">
                                    <div class="w-40 sm:w-full aspect-[3/4] bg-slate-100 rounded-xl overflow-hidden shadow-md relative border border-slate-200">
                                        <template x-if="activeBook.image">
                                            <img :src="activeBook.image" 
                                                 :alt="activeBook.title" 
                                                 class="w-full h-full object-cover">
                                        </template>
                                        <template x-if="!activeBook.image">
                                            <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                                                <span class="text-4xl">📚</span>
                                                <span class="text-[10px] mt-1">ไม่มีรูปปก</span>
                                            </div>
                                        </template>
                                    </div>
                                    <div class="mt-3 flex flex-wrap gap-1.5 justify-center">
                                        <span class="px-2 py-0.5 rounded bg-emerald-700 text-white text-[10px] font-semibold">
                                            พร้อมแลกเปลี่ยน
                                        </span>
                                        <template x-if="activeBook.condition">
                                            <span class="px-2 py-0.5 rounded bg-slate-800 text-white text-[10px] font-medium" x-text="activeBook.condition"></span>
                                        </template>
                                    </div>
                                </div>

                                <!-- Book Info -->
                                <div class="flex-1 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="px-2.5 py-0.5 rounded bg-violet-100 text-violet-800 text-xs font-semibold" x-text="activeBook.category"></span>
                                        </div>

                                        <h2 class="text-xl font-bold text-slate-900 leading-snug" x-text="activeBook.title"></h2>
                                        <p class="text-xs text-slate-500 mt-1">
                                            ผู้แต่ง: <span class="font-semibold text-slate-700" x-text="activeBook.author"></span>
                                        </p>
                                        <p class="text-xs text-slate-500 mt-0.5">
                                            ลงทะเบียนโดย: <span class="font-semibold text-slate-700" x-text="activeBook.user_name"></span>
                                        </p>

                                        <div class="mt-4">
                                            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">
                                                รายละเอียดหนังสือ
                                            </h4>
                                            <div class="text-xs text-slate-600 leading-relaxed bg-slate-50 p-3 rounded-xl border border-slate-100 max-h-36 overflow-y-auto whitespace-pre-line"
                                                 x-text="activeBook.description">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- View Only Warning -->
                                    <div class="mt-5 p-3.5 rounded-xl bg-amber-50 border border-amber-200/90 text-amber-900 text-xs flex items-start gap-2.5">
                                        <svg class="w-4 h-4 text-amber-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                        <div>
                                            <span class="font-bold">โหมดผู้เยี่ยมชม (ดูได้อย่างเดียว):</span>
                                            <p class="mt-0.5 text-amber-800/90 leading-relaxed">
                                                คุณสามารถดูรายละเอียดหนังสือได้อย่างเดียว ยังไม่สามารถทำรายการหรือส่งคำขอแลกเปลี่ยนได้ หากต้องการแลกเปลี่ยนหนังสือเล่มนี้ กรุณาเข้าสู่ระบบหรือสมัครสมาชิก
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Modal Footer -->
                    <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50 flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('login') }}" 
                               class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-violet-700 hover:bg-violet-800 text-white font-semibold text-xs shadow-xs transition-colors">
                                <span>🔑 เข้าสู่ระบบเพื่อแลกเปลี่ยน</span>
                            </a>
                            <a href="{{ route('register') }}" 
                               class="inline-flex items-center px-4 py-2 rounded-xl border border-slate-300 hover:bg-white text-slate-700 font-semibold text-xs transition-colors">
                                <span>สมัครสมาชิกใหม่</span>
                            </a>
                        </div>
                        <div class="flex items-center gap-3">
                            <a :href="activeBook?.show_url" 
                               class="text-xs text-violet-700 hover:text-violet-900 font-medium underline">
                                ดูหน้ารายละเอียดเต็ม ↗
                            </a>
                            <button @click="modalOpen = false" 
                                    class="px-3 py-1.5 rounded-lg text-slate-500 hover:text-slate-800 text-xs font-medium">
                                ปิด
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- 6. Formal CTA Banner -->
        <section class="py-14 bg-violet-950 text-white text-center border-t-4 border-violet-500">
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
                        <img src="{{ asset('images/logo-icon.png') }}" alt="BookCycle" class="w-8 h-8 object-contain shrink-0">
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
