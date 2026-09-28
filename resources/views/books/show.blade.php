@auth
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-slate-800 leading-tight flex items-center gap-2.5">
                <span>📖</span>
                <span>รายละเอียดหนังสือ</span>
            </h2>

            @if(auth()->id() === $book->user_id)
                <a href="{{ route('books.index') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900">
                    <span>←</span> <span>กลับไปหน้ารายการหนังสือของฉัน</span>
                </a>
            @else
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900">
                    <span>←</span> <span>กลับไปหน้าแดชบอร์ด</span>
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl border border-slate-200/90 shadow-sm overflow-hidden flex flex-col md:flex-row">
                
                {{-- Book Cover Preview --}}
                <div class="w-full md:w-80 bg-slate-100 flex items-center justify-center p-6 shrink-0">
                    <div class="w-full max-w-[240px] aspect-[3/4] bg-white rounded-2xl overflow-hidden shadow-md relative">
                        @if($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" 
                                 alt="{{ $book->title }}" 
                                 class="w-full h-full object-cover"
                                 onerror="this.onerror=null; this.src='{{ asset('images/logo-icon.png') }}';">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-indigo-50 to-slate-100 text-slate-400">
                                <span class="text-5xl">📚</span>
                                <span class="text-xs text-slate-400 mt-2 font-medium">ไม่มีรูปภาพปก</span>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Book Information --}}
                <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-2 mb-3">
                            @if($book->category)
                                <span class="px-2.5 py-1 rounded-md bg-indigo-50 text-indigo-700 text-xs font-semibold">
                                    {{ $book->category }}
                                </span>
                            @endif

                            @if($book->status === 'available')
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    พร้อมแลกเปลี่ยน
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-600">
                                    แลกเปลี่ยนแล้ว
                                </span>
                            @endif
                        </div>

                        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 leading-tight">
                            {{ $book->title }}
                        </h1>

                        <p class="text-sm text-slate-500 mt-1">
                            ผู้แต่ง: <span class="font-semibold text-slate-700">{{ $book->author ?? 'ไม่ระบุ' }}</span>
                        </p>

                        <div class="flex flex-wrap gap-2 mt-3 text-xs">
                            @if($book->condition)
                                <div class="px-3 py-1 rounded-lg bg-slate-50 border border-slate-200 text-slate-600">
                                    <span>สภาพ:</span> <strong class="text-slate-800">{{ $book->condition }}</strong>
                                </div>
                            @endif
                            <div class="px-3 py-1 rounded-lg bg-slate-50 border border-slate-200 text-slate-600">
                                <span>ลงทะเบียนโดย:</span> <strong class="text-slate-800">{{ $book->user->name ?? 'สมาชิก BookCycle' }}</strong>
                            </div>
                        </div>

                        <div class="mt-6">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">
                                รายละเอียดเกี่ยวกับหนังสือ
                            </h4>
                            <p class="text-sm text-slate-600 leading-relaxed whitespace-pre-line bg-slate-50/50 p-4 rounded-2xl border border-slate-100">
                                {{ $book->description ?: 'ไม่มีรายละเอียดเพิ่มเติม' }}
                            </p>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="mt-8 pt-6 border-t border-slate-100 flex flex-wrap items-center gap-3">
                        @if(auth()->id() === $book->user_id)
                            <a href="{{ route('books.edit', $book) }}" 
                               class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-600 text-white font-semibold text-sm shadow-sm transition-all">
                                <span>✏️</span> <span>แก้ไขข้อมูล</span>
                            </a>

                            <form method="POST" action="{{ route('books.destroy', $book) }}"
                                  onsubmit="return confirm('ยืนยันว่าต้องการลบหนังสือเล่มนี้?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-xl bg-red-50 hover:bg-red-100 text-red-700 font-semibold text-sm border border-red-200 transition-all">
                                    <span>🗑️</span> <span>ลบหนังสือ</span>
                                </button>
                            </form>

                            <a href="{{ route('books.index') }}" 
                               class="inline-flex items-center gap-1 px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-100 font-medium text-sm transition-all ml-auto">
                                <span>← กลับ</span>
                            </a>
                        @else
                            @if($book->status === 'available')
                                <a href="{{ route('matching.index') }}" 
                                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-violet-700 hover:bg-violet-800 text-white font-semibold text-sm shadow-sm transition-all">
                                    <span>🔄</span> <span>ตรวจสอบการจับคู่ / แลกเปลี่ยน</span>
                                </a>
                            @endif

                            <a href="{{ route('dashboard') }}" 
                               class="inline-flex items-center gap-1 px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-100 font-medium text-sm transition-all ml-auto">
                                <span>← กลับ</span>
                            </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
@else
{{-- สำหรับผู้ใช้ที่ยังไม่เข้าสู่ระบบ (Guest / ดูได้อย่างเดียว) --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $book->title }} - {{ config('app.name', 'BookCycle') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-slate-800 bg-[#f6f3fa] min-h-screen flex flex-col justify-between selection:bg-violet-800 selection:text-white">
    
    <!-- Top Navbar -->
    <nav class="bg-white border-b border-slate-200 sticky top-0 z-30 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="/" class="flex items-center gap-2.5">
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

                <div class="flex items-center gap-2 sm:gap-3">
                    <a href="/" class="text-xs sm:text-sm font-medium text-slate-600 hover:text-slate-900 px-3 py-1.5 transition-colors">
                        ← หน้าแรก
                    </a>
                    <a href="{{ route('login') }}" class="px-3.5 py-2 rounded-lg text-xs sm:text-sm font-medium text-slate-700 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                        เข้าสู่ระบบ
                    </a>
                    <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 rounded-lg bg-violet-700 hover:bg-violet-800 text-white text-xs sm:text-sm font-semibold shadow-xs transition-colors">
                        สมัครสมาชิก
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            
            <!-- Breadcrumb / Back button -->
            <div class="mb-6 flex items-center justify-between flex-wrap gap-3">
                <a href="{{ url()->previous() !== url()->current() ? url()->previous() : url('/') }}" 
                   class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 bg-white border border-slate-200 px-3.5 py-1.5 rounded-lg shadow-xs transition-colors">
                    <span>←</span> <span>ย้อนกลับ</span>
                </a>

                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200">
                    <svg class="w-3.5 h-3.5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    <span>โหมดดูได้อย่างเดียว (ยังไม่ได้เข้าสู่ระบบ)</span>
                </span>
            </div>

            <!-- Book Card -->
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col md:flex-row">
                
                {{-- Cover Preview --}}
                <div class="w-full md:w-80 bg-slate-100 flex items-center justify-center p-6 shrink-0">
                    <div class="w-full max-w-[240px] aspect-[3/4] bg-white rounded-2xl overflow-hidden shadow-md relative">
                        @if($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" 
                                 alt="{{ $book->title }}" 
                                 class="w-full h-full object-cover"
                                 onerror="this.onerror=null; this.src='{{ asset('images/logo-icon.png') }}';">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-violet-50 to-slate-100 text-slate-400">
                                <span class="text-5xl">📚</span>
                                <span class="text-xs text-slate-400 mt-2 font-medium">ไม่มีรูปภาพปก</span>
                            </div>
                        @endif

                        <div class="absolute top-2.5 right-2.5">
                            <span class="px-2.5 py-1 rounded-md bg-emerald-700 text-white text-[11px] font-semibold shadow-xs">
                                พร้อมแลกเปลี่ยน
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Book Details --}}
                <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex flex-wrap items-center gap-2 mb-3">
                            @if($book->category)
                                <span class="px-2.5 py-1 rounded-md bg-violet-50 text-violet-700 text-xs font-semibold border border-violet-100">
                                    หมวดหมู่: {{ $book->category }}
                                </span>
                            @endif

                            @if($book->condition)
                                <span class="px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 text-xs font-medium border border-slate-200">
                                    สภาพ: {{ $book->condition }}
                                </span>
                            @endif
                        </div>

                        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight">
                            {{ $book->title }}
                        </h1>

                        <p class="text-sm text-slate-600 mt-1.5">
                            ผู้แต่ง: <span class="font-semibold text-slate-800">{{ $book->author ?? 'ไม่ระบุ' }}</span>
                        </p>

                        <div class="mt-3 text-xs text-slate-500">
                            ลงทะเบียนโดย: <span class="font-semibold text-slate-700">สมาชิก {{ $book->user->name ?? '-' }}</span>
                        </div>

                        <div class="mt-6">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">
                                รายละเอียดเกี่ยวกับหนังสือ
                            </h4>
                            <div class="text-sm text-slate-700 leading-relaxed whitespace-pre-line bg-slate-50 p-4 rounded-2xl border border-slate-100 min-h-[100px]">
                                {{ $book->description ?: 'เจ้าของหนังสือไม่ได้ระบุรายละเอียดเพิ่มเติม' }}
                            </div>
                        </div>

                        <!-- Info Box (ดูได้อย่างเดียว) -->
                        <div class="mt-6 p-4 rounded-2xl bg-amber-50 border border-amber-200 text-amber-900 flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <div class="text-xs sm:text-sm">
                                <div class="font-bold text-amber-950">โหมดผู้เยี่ยมชม (ดูได้อย่างเดียว)</div>
                                <p class="mt-1 text-amber-800 leading-relaxed">
                                    คุณสามารถดูรายละเอียดหนังสือได้ แต่ยังไม่สามารถส่งคำขอแลกเปลี่ยนหรือดำเนินการใดๆ ได้ หากต้องการแลกเปลี่ยนหนังสือเล่มนี้ กรุณาเข้าสู่ระบบหรือสมัครสมาชิก
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-8 pt-6 border-t border-slate-100 flex flex-wrap items-center gap-3">
                        <a href="{{ route('login') }}" 
                           class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-violet-700 hover:bg-violet-800 text-white font-semibold text-xs sm:text-sm shadow-xs transition-colors">
                            <span>🔑 เข้าสู่ระบบเพื่อแลกเปลี่ยน</span>
                        </a>

                        <a href="{{ route('register') }}" 
                           class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white hover:bg-slate-50 text-slate-700 font-semibold text-xs sm:text-sm border border-slate-200 shadow-xs transition-colors">
                            <span>สมัครสมาชิกใหม่</span>
                        </a>

                        <a href="/" 
                           class="inline-flex items-center gap-1 px-4 py-2.5 rounded-xl text-slate-500 hover:text-slate-800 font-medium text-xs sm:text-sm transition-colors ml-auto">
                            <span>← กลับสู่หน้าแรก</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 py-6 text-slate-500 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2.5">
                <img src="{{ asset('images/logo-icon.png') }}" alt="BookCycle" class="w-6 h-6 object-contain shrink-0">
                <span class="font-bold text-slate-800 text-sm tracking-tight">BookCycle Platform</span>
                <span class="text-xs text-slate-400 hidden sm:inline">| ระบบบริหารการแลกเปลี่ยนหนังสือแบบหมุนเวียน</span>
            </div>
            <div class="text-xs text-slate-400 text-center sm:text-right">
                <span>© {{ date('Y') }} BookCycle. สงวนลิขสิทธิ์ตามกฎหมาย.</span>
            </div>
        </div>
    </footer>

</body>
</html>
@endauth