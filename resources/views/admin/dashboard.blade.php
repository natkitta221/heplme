<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-bold text-xl text-slate-900 tracking-tight flex items-center gap-2">
                    <span>ศูนย์บริหารจัดการระบบส่วนกลาง (Administration Center)</span>
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">
                    ตรวจสอบและจัดการข้อมูลสมาชิก คลังหนังสือ คำขอแลกเปลี่ยน และรายงานปัญหาทั้งหมดในระบบ
                </p>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 transition-colors shadow-xs">
                    <svg class="w-3.5 h-3.5 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"/>
                        <polyline points="12 19 5 12 12 5"/>
                    </svg>
                    <span>กลับหน้า Dashboard สมาชิก</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- 5 Metric Cards (สไตล์ทางการ) --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">

                {{-- 1. Users --}}
                <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-xs">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">ผู้ใช้งานทั้งหมด</p>
                            <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ number_format($usersCount) }}</h3>
                            <p class="text-[11px] text-slate-500 font-medium mt-0.5">บัญชีสมาชิกในระบบ</p>
                        </div>
                        <div class="w-10 h-10 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3 pt-2.5 border-t border-slate-100">
                        <a href="{{ route('admin.users.index') }}" class="text-xs font-semibold text-slate-700 hover:text-slate-900 flex items-center gap-1">
                            จัดการข้อมูลสมาชิก →
                        </a>
                    </div>
                </div>

                {{-- 2. Books --}}
                <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-xs">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">หนังสือในระบบ</p>
                            <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ number_format($booksCount) }}</h3>
                            <p class="text-[11px] text-emerald-700 font-medium mt-0.5">พร้อมสำหรับการแลกเปลี่ยน</p>
                        </div>
                        <div class="w-10 h-10 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                                <path d="M6 6h10"/>
                                <path d="M6 10h10"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3 pt-2.5 border-t border-slate-100">
                        <a href="{{ route('admin.books.index') }}" class="text-xs font-semibold text-slate-700 hover:text-slate-900 flex items-center gap-1">
                            จัดการคลังหนังสือ →
                        </a>
                    </div>
                </div>

                {{-- 3. Wanted Books --}}
                <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-xs">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">หนังสือที่ต้องการ</p>
                            <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ number_format($wantedBooksCount) }}</h3>
                            <p class="text-[11px] text-slate-500 font-medium mt-0.5">รายการที่สมาชิกตามหา</p>
                        </div>
                        <div class="w-10 h-10 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"/>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3 pt-2.5 border-t border-slate-100">
                        <a href="{{ route('admin.wanted-books.index') }}" class="text-xs font-semibold text-slate-700 hover:text-slate-900 flex items-center gap-1">
                            จัดการรายการที่ตามหา →
                        </a>
                    </div>
                </div>

                {{-- 4. Exchange Requests --}}
                <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-xs">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">คำขอแลกเปลี่ยน</p>
                            <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ number_format($exchangeRequestsCount) }}</h3>
                            <p class="text-[11px] text-slate-500 font-medium mt-0.5">รายการแลกเปลี่ยนทั้งหมด</p>
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
                    <div class="mt-3 pt-2.5 border-t border-slate-100">
                        <a href="{{ route('admin.exchange-requests.index') }}" class="text-xs font-semibold text-slate-700 hover:text-slate-900 flex items-center gap-1">
                            ตรวจสอบประวัติคำขอ →
                        </a>
                    </div>
                </div>

                {{-- 5. Reports --}}
                <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-xs">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">รายงานปัญหา</p>
                            <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ number_format($reportsCount) }}</h3>
                            <p class="text-[11px] text-rose-700 font-medium mt-0.5">เรื่องรอดำเนินการ</p>
                        </div>
                        <div class="w-10 h-10 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/>
                                <line x1="12" y1="9" x2="12" y2="13"/>
                                <line x1="12" y1="17" x2="12.01" y2="17"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3 pt-2.5 border-t border-slate-100">
                        <a href="{{ route('admin.reports.index') }}" class="text-xs font-semibold text-slate-700 hover:text-slate-900 flex items-center gap-1">
                            จัดการรายงานปัญหา →
                        </a>
                    </div>
                </div>

            </div>

            {{-- Admin Modules Grid (สไตล์ทางการ) --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-xs p-6">
                <div class="mb-5 pb-3 border-b border-slate-100">
                    <h3 class="text-base font-bold text-slate-900">
                        โมดูลบริหารจัดการระบบ
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">
                        เลือกโมดูลเพื่อเข้าสู่ระบบงานที่ต้องการตรวจสอบและจัดการ
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                    <a href="{{ route('admin.users.index') }}" 
                       class="p-5 rounded-lg bg-slate-50 hover:bg-slate-100 border border-slate-200 transition-colors flex flex-col justify-between group">
                        <div>
                            <div class="w-9 h-9 rounded-md bg-white border border-slate-200 text-slate-700 flex items-center justify-center mb-3 shadow-xs">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                </svg>
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm">จัดการผู้ใช้งาน</h4>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">ตรวจสอบสิทธิ์ บันทึกข้อมูลสมาชิก และระงับการใช้งาน</p>
                        </div>
                        <div class="mt-4 pt-2 border-t border-slate-200/60 text-xs font-semibold text-slate-700">
                            เข้าสู่โมดูล →
                        </div>
                    </a>

                    <a href="{{ route('admin.books.index') }}" 
                       class="p-5 rounded-lg bg-slate-50 hover:bg-slate-100 border border-slate-200 transition-colors flex flex-col justify-between group">
                        <div>
                            <div class="w-9 h-9 rounded-md bg-white border border-slate-200 text-slate-700 flex items-center justify-center mb-3 shadow-xs">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                                    <path d="M6 6h10"/>
                                    <path d="M6 10h10"/>
                                </svg>
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm">จัดการหนังสือ</h4>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">ตรวจสอบรายการหนังสือที่ลงทะเบียนในคลังระบบทั้งหมด</p>
                        </div>
                        <div class="mt-4 pt-2 border-t border-slate-200/60 text-xs font-semibold text-slate-700">
                            เข้าสู่โมดูล →
                        </div>
                    </a>

                    <a href="{{ route('admin.wanted-books.index') }}" 
                       class="p-5 rounded-lg bg-slate-50 hover:bg-slate-100 border border-slate-200 transition-colors flex flex-col justify-between group">
                        <div>
                            <div class="w-9 h-9 rounded-md bg-white border border-slate-200 text-slate-700 flex items-center justify-center mb-3 shadow-xs">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"/>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                </svg>
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm">หนังสือที่ต้องการ</h4>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">ตรวจสอบความต้องการหนังสือที่สมาชิกลงประกาศตามหา</p>
                        </div>
                        <div class="mt-4 pt-2 border-t border-slate-200/60 text-xs font-semibold text-slate-700">
                            เข้าสู่โมดูล →
                        </div>
                    </a>

                    <a href="{{ route('admin.exchange-requests.index') }}" 
                       class="p-5 rounded-lg bg-slate-50 hover:bg-slate-100 border border-slate-200 transition-colors flex flex-col justify-between group">
                        <div>
                            <div class="w-9 h-9 rounded-md bg-white border border-slate-200 text-slate-700 flex items-center justify-center mb-3 shadow-xs">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m16 3 4 4-4 4"/>
                                    <path d="M20 7H4"/>
                                    <path d="m8 21-4-4 4-4"/>
                                    <path d="M4 17h16"/>
                                </svg>
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm">คำขอแลกเปลี่ยน</h4>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">ตรวจสอบสถานะคำขอ ข้อตกลง และประวัติการจับคู่</p>
                        </div>
                        <div class="mt-4 pt-2 border-t border-slate-200/60 text-xs font-semibold text-slate-700">
                            เข้าสู่โมดูล →
                        </div>
                    </a>

                    <a href="{{ route('admin.reports.index') }}" 
                       class="p-5 rounded-lg bg-slate-50 hover:bg-slate-100 border border-slate-200 transition-colors flex flex-col justify-between group">
                        <div>
                            <div class="w-9 h-9 rounded-md bg-white border border-slate-200 text-slate-700 flex items-center justify-center mb-3 shadow-xs">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/>
                                    <line x1="12" y1="9" x2="12" y2="13"/>
                                    <line x1="12" y1="17" x2="12.01" y2="17"/>
                                </svg>
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm">รายงานปัญหา</h4>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">พิจารณาข้อร้องเรียนและรายงานพฤติกรรมที่ไม่เหมาะสม</p>
                        </div>
                        <div class="mt-4 pt-2 border-t border-slate-200/60 text-xs font-semibold text-slate-700">
                            เข้าสู่โมดูล →
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>