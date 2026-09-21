<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-bold text-xl text-slate-900 tracking-tight flex items-center gap-2">
                    <span>แผงควบคุมระบบ (Dashboard)</span>
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">
                    ภาพรวมสถิติและสถานะการแลกเปลี่ยนหนังสือของคุณ
                </p>
            </div>

            <!-- Quick Action Buttons -->
            <div class="flex items-center gap-2">
                <a href="{{ route('books.create') }}" 
                   class="inline-flex items-center gap-2 px-3.5 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-semibold shadow-xs transition-colors">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"/>
                        <line x1="5" y1="12" x2="19" y2="12"/>
                    </svg>
                    <span>ลงทะเบียนหนังสือ</span>
                </a>
                <a href="{{ route('wanted-books.create') }}" 
                   class="inline-flex items-center gap-2 px-3.5 py-2 bg-white hover:bg-slate-50 text-slate-700 border border-slate-300 rounded-lg text-xs font-semibold shadow-xs transition-colors">
                    <svg class="w-3.5 h-3.5 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    <span>ตามหาหนังสือ</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- 1. Formal Welcome Banner --}}
            <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-xs flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="max-w-2xl">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-700 text-[11px] font-semibold border border-slate-200 uppercase tracking-wider">
                            BookCycle System
                        </span>
                        <span class="text-xs text-slate-400">• สมาชิกทั่วไป</span>
                    </div>
                    <h1 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">
                        ยินดีต้อนรับ, {{ Auth::user()->name }}
                    </h1>
                    <p class="text-slate-600 text-xs sm:text-sm mt-1.5 leading-relaxed">
                        ศูนย์กลางระบบบริหารและแลกเปลี่ยนหนังสือแบบหมุนเวียน ตรวจสอบรายการหนังสือที่ตรงความต้องการและจัดการคำขอแลกเปลี่ยนอย่างเป็นระบบ
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 shrink-0">
                    <a href="{{ route('matching.index') }}" 
                       class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-slate-900 hover:bg-slate-800 text-white font-medium text-xs shadow-xs transition-colors">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 18l6-6-6-6"/>
                            <circle cx="6" cy="12" r="3"/>
                            <circle cx="18" cy="12" r="3"/>
                        </svg>
                        <span>ตรวจสอบหนังสือที่ตรงกัน</span>
                        @if($matchesCount > 0)
                            <span class="px-1.5 py-0.2 rounded text-[10px] font-bold bg-emerald-600 text-white">
                                {{ $matchesCount }}
                            </span>
                        @endif
                    </a>
                    <a href="{{ route('exchange-requests.index') }}" 
                       class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-white hover:bg-slate-50 text-slate-700 font-medium text-xs border border-slate-300 shadow-xs transition-colors">
                        <svg class="w-4 h-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m16 3 4 4-4 4"/>
                            <path d="M20 7H4"/>
                            <path d="m8 21-4-4 4-4"/>
                            <path d="M4 17h16"/>
                        </svg>
                        <span>คำขอแลกเปลี่ยน</span>
                        @if($receivedPendingCount > 0)
                            <span class="px-1.5 py-0.2 rounded text-[10px] font-bold bg-amber-600 text-white">
                                {{ $receivedPendingCount }}
                            </span>
                        @endif
                    </a>
                </div>
            </div>

            {{-- 2. Formal Statistics Grid --}}
            <div>
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider">
                        สรุปข้อมูลสถิติของบัญชี
                    </h3>
                    <span class="text-xs text-slate-400">ข้อมูลล่าสุด</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    
                    {{-- Card 1: หนังสือของฉัน --}}
                    <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-xs">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-xs font-semibold text-slate-500">หนังสือของฉัน</p>
                                <h4 class="text-2xl font-bold text-slate-900 mt-1">{{ $myBooksCount }}</h4>
                                <p class="text-xs text-emerald-700 font-medium mt-1 flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    <span>พร้อมแลก {{ $myAvailableBooksCount }} เล่ม</span>
                                </p>
                            </div>
                            <div class="w-10 h-10 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                                    <path d="M6 6h10"/>
                                    <path d="M6 10h10"/>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-slate-100 flex justify-between items-center text-xs">
                            <a href="{{ route('books.index') }}" class="text-slate-700 font-semibold hover:text-slate-900">
                                ดูรายการทั้งหมด →
                            </a>
                            <a href="{{ route('books.create') }}" class="text-slate-400 hover:text-slate-600">
                                + เพิ่มเล่มใหม่
                            </a>
                        </div>
                    </div>

                    {{-- Card 2: หนังสือที่ตามหา --}}
                    <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-xs">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-xs font-semibold text-slate-500">หนังสือที่ต้องการ</p>
                                <h4 class="text-2xl font-bold text-slate-900 mt-1">{{ $myWantedBooksCount }}</h4>
                                <p class="text-xs text-slate-500 font-medium mt-1 flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                    <span>รายการที่กำลังตามหา</span>
                                </p>
                            </div>
                            <div class="w-10 h-10 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"/>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-slate-100 flex justify-between items-center text-xs">
                            <a href="{{ route('wanted-books.index') }}" class="text-slate-700 font-semibold hover:text-slate-900">
                                ดูรายการที่ตามหา →
                            </a>
                            <a href="{{ route('wanted-books.create') }}" class="text-slate-400 hover:text-slate-600">
                                + เพิ่มรายการ
                            </a>
                        </div>
                    </div>

                    {{-- Card 3: คำขอแลกเปลี่ยน --}}
                    <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-xs">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-xs font-semibold text-slate-500">คำขอรอดำเนินการ</p>
                                <h4 class="text-2xl font-bold text-slate-900 mt-1">
                                    {{ $receivedPendingCount + $sentPendingCount }}
                                </h4>
                                <p class="text-xs text-slate-500 font-medium mt-1">
                                    ได้รับ {{ $receivedPendingCount }} | ส่งออก {{ $sentPendingCount }}
                                </p>
                            </div>
                            <div class="w-10 h-10 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m16 3 4 4-4 4"/>
                                    <path d="M20 7H4"/>
                                    <path d="m8 21-4-4 4-4"/>
                                    <path d="M4 17h16"/>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-slate-100 flex justify-between items-center text-xs">
                            <a href="{{ route('exchange-requests.index') }}" class="text-slate-700 font-semibold hover:text-slate-900">
                                จัดการคำขอ →
                            </a>
                            <span class="text-emerald-700 font-medium">
                                สำเร็จแล้ว {{ $successfulExchangesCount }}
                            </span>
                        </div>
                    </div>

                    {{-- Card 4: คู่ที่ตรงกัน (Matching) --}}
                    <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-xs">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-xs font-semibold text-slate-500">คู่ที่ตรงกัน (Match)</p>
                                <h4 class="text-2xl font-bold text-slate-900 mt-1">{{ $matchesCount }}</h4>
                                <p class="text-xs text-slate-500 font-medium mt-1">
                                    @if($matchesCount > 0)
                                        <span>2-Way: {{ $twoWayMatchesCount ?? 0 }} | 3-Way: {{ $threeWayMatchesCount ?? 0 }}</span>
                                    @else
                                        <span>ยังไม่พบคู่ตรงกัน</span>
                                    @endif
                                </p>
                            </div>
                            <div class="w-10 h-10 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 18l6-6-6-6"/>
                                    <circle cx="6" cy="12" r="3"/>
                                    <circle cx="18" cy="12" r="3"/>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-slate-100 flex justify-between items-center text-xs">
                            <a href="{{ route('matching.index') }}" class="text-slate-900 font-semibold hover:underline">
                                ตรวจสอบคู่แลกเปลี่ยน →
                            </a>
                            <span class="text-slate-400">ระบบจับคู่</span>
                        </div>
                    </div>

                </div>
            </div>

            {{-- 3. System Summary Ribbon --}}
            <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-xs">
                <div class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-slate-100 gap-4 md:gap-0">
                    <div class="flex items-center gap-3 px-3 py-1">
                        <div class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-[11px] text-slate-500 font-medium">สมาชิกทั้งหมดในระบบ</div>
                            <div class="text-base font-bold text-slate-900">{{ number_format($totalPlatformUsers) }} คน</div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 px-3 py-1 md:pl-6">
                        <div class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                                <path d="M6 6h10"/>
                                <path d="M6 10h10"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-[11px] text-slate-500 font-medium">หนังสือในคลังระบบ</div>
                            <div class="text-base font-bold text-slate-900">{{ number_format($totalPlatformBooks) }} เล่ม</div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 px-3 py-1 md:pl-6">
                        <div class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-[11px] text-slate-500 font-medium">แลกเปลี่ยนสำเร็จแล้ว</div>
                            <div class="text-base font-bold text-slate-900">{{ number_format($totalPlatformExchanges) }} ครั้ง</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 4. Community Available Books Showcase --}}
            <div>
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider">
                            หนังสือที่พร้อมแลกเปลี่ยนในระบบ
                        </h3>
                        <p class="text-xs text-slate-500">รายการหนังสือล่าสุดที่ลงทะเบียนโดยสมาชิก</p>
                    </div>
                    <a href="{{ route('matching.index') }}" class="text-xs font-semibold text-slate-700 hover:text-slate-900">
                        ค้นหาคู่ที่ตรงกัน →
                    </a>
                </div>

                @if($communityBooks->count() > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                        @foreach($communityBooks as $cBook)
                            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-xs hover:border-slate-300 transition-all flex flex-col group">
                                {{-- Book Cover --}}
                                <div class="relative aspect-[3/4] bg-slate-100 overflow-hidden">
                                    @if($cBook->image)
                                        <img src="{{ asset('storage/' . $cBook->image) }}" 
                                             alt="{{ $cBook->title }}" 
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

                                    @if($cBook->condition)
                                        <span class="absolute top-2 right-2 px-1.5 py-0.5 rounded bg-slate-900/80 text-white text-[10px] font-medium">
                                            {{ $cBook->condition }}
                                        </span>
                                    @endif
                                </div>

                                {{-- Details --}}
                                <div class="p-3 flex-1 flex flex-col justify-between">
                                    <div>
                                        <h5 class="font-semibold text-xs sm:text-sm text-slate-900 line-clamp-1 leading-snug" title="{{ $cBook->title }}">
                                            {{ $cBook->title }}
                                        </h5>
                                        <p class="text-[11px] text-slate-500 truncate mt-0.5">
                                            {{ $cBook->author ?? 'ไม่ระบุผู้แต่ง' }}
                                        </p>
                                    </div>

                                    <div class="mt-3 pt-2 border-t border-slate-100 flex items-center justify-between text-[11px]">
                                        <span class="text-slate-500 truncate max-w-[80px]">
                                            {{ $cBook->user->name ?? 'สมาชิก' }}
                                        </span>
                                        <span class="text-emerald-700 font-semibold">
                                            พร้อมแลก
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white rounded-xl border border-slate-200 p-8 text-center text-slate-500">
                        <svg class="w-10 h-10 text-slate-300 mx-auto mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                            <path d="M6 6h10"/>
                            <path d="M6 10h10"/>
                        </svg>
                        <p class="font-medium text-sm text-slate-700">ยังไม่มีหนังสือจากเพื่อนสมาชิก</p>
                        <p class="text-xs text-slate-400 mt-1">เริ่มต้นลงทะเบียนหนังสือเล่มแรกของคุณได้ทันที</p>
                    </div>
                @endif
            </div>

            {{-- 5. Recent Exchange Requests Activity --}}
            @if($recentRequests->count() > 0)
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider">
                            ประวัติคำขอล่าสุด
                        </h3>
                        <a href="{{ route('exchange-requests.index') }}" class="text-xs font-semibold text-slate-700 hover:text-slate-900">
                            ดูคำขอทั้งหมด →
                        </a>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 divide-y divide-slate-100 shadow-xs overflow-hidden">
                        @foreach($recentRequests as $req)
                            <div class="p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 hover:bg-slate-50 transition-colors">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg {{ $req->requester_id === Auth::id() ? 'bg-slate-100 text-slate-700' : 'bg-slate-100 text-slate-700' }} flex items-center justify-center shrink-0">
                                        @if($req->requester_id === Auth::id())
                                            <svg class="w-4 h-4 text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="22" y1="2" x2="11" y2="13"/>
                                                <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                                <polyline points="7 10 12 15 17 10"/>
                                                <line x1="12" y1="15" x2="12" y2="3"/>
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-xs sm:text-sm font-semibold text-slate-800">
                                            @if($req->requester_id === Auth::id())
                                                ส่งคำขอแลกเปลี่ยนไปยัง <span class="text-slate-900 underline">{{ $req->receiver->name ?? 'สมาชิก' }}</span>
                                            @else
                                                ได้รับคำขอแลกเปลี่ยนจาก <span class="text-slate-900 underline">{{ $req->requester->name ?? 'สมาชิก' }}</span>
                                            @endif
                                        </p>
                                        <p class="text-[11px] text-slate-500 mt-0.5">
                                            เสนอ: {{ $req->offeredBook->title ?? '-' }} ⇄ ต้องการ: {{ $req->requestedBook->title ?? '-' }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 self-end sm:self-center">
                                    @if($req->status === 'pending')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-600"></span>
                                            รอดำเนินการ
                                        </span>
                                    @elseif($req->status === 'accepted')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                                            แลกเปลี่ยนสำเร็จ
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded text-xs font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                                            ปฏิเสธแล้ว
                                        </span>
                                    @endif

                                    <a href="{{ route('exchange-requests.index') }}" class="text-xs font-semibold text-slate-700 hover:text-slate-900 px-2 py-1 rounded border border-slate-200 hover:bg-slate-50">
                                        ดูรายละเอียด
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
