<nav x-data="{ open: false }" class="bg-white border-b border-slate-200 sticky top-0 z-30 shadow-xs">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            
            <div class="flex items-center gap-6 lg:gap-8">
                <!-- Formal Corporate Logo -->
                <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="flex items-center gap-3 shrink-0">
                    <div class="w-9 h-9 rounded-lg {{ Auth::user()->role === 'admin' ? 'bg-slate-900' : 'bg-slate-800' }} text-white flex items-center justify-center shadow-xs">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                            <path d="M6 6h10"/>
                            <path d="M6 10h7"/>
                        </svg>
                    </div>
                    <div class="flex flex-col text-left">
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-base text-slate-900 tracking-tight leading-tight">
                                BookCycle
                            </span>
                            @if(Auth::user()->role === 'admin')
                                <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-700 text-[10px] font-semibold border border-slate-200 uppercase tracking-wider">
                                    ADMIN
                                </span>
                            @endif
                        </div>
                        <span class="text-[11px] text-slate-500 font-normal">
                            {{ Auth::user()->role === 'admin' ? 'ระบบบริหารจัดการส่วนกลาง' : 'ระบบแลกเปลี่ยนหนังสือหมุนเวียน' }}
                        </span>
                    </div>
                </a>

                <!-- Navigation Links -->
                <div class="hidden lg:flex items-center gap-1">
                    @if(Auth::user()->role === 'admin')
                        {{-- ==========================================
                            ADMIN MENUS (สไตล์ทางการ)
                        =========================================== --}}

                        <!-- 1. ภาพรวมระบบ -->
                        @php $isDashboardActive = request()->routeIs('admin.dashboard'); @endphp
                        <a href="{{ route('admin.dashboard') }}" 
                           class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs xl:text-sm font-medium transition-colors {{ $isDashboardActive ? 'bg-slate-900 text-white font-semibold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                            <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="7" height="9" x="3" y="3" rx="1"/>
                                <rect width="7" height="5" x="14" y="3" rx="1"/>
                                <rect width="7" height="9" x="14" y="12" rx="1"/>
                                <rect width="7" height="5" x="3" y="16" rx="1"/>
                            </svg>
                            <span>ภาพรวมระบบ</span>
                        </a>

                        <!-- 2. จัดการสมาชิก -->
                        @php $isUsersActive = request()->routeIs('admin.users.*'); @endphp
                        <a href="{{ route('admin.users.index') }}" 
                           class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs xl:text-sm font-medium transition-colors {{ $isUsersActive ? 'bg-slate-900 text-white font-semibold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                            <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                            <span>จัดการสมาชิก</span>
                            <span class="px-1.5 py-0.2 rounded text-[11px] font-semibold {{ $isUsersActive ? 'bg-slate-800 text-white' : 'bg-slate-200 text-slate-700' }}">
                                {{ $navUsersCount ?? 0 }}
                            </span>
                        </a>

                        <!-- 3. จัดการหนังสือ -->
                        @php $isBooksActive = request()->routeIs('admin.books.*'); @endphp
                        <a href="{{ route('admin.books.index') }}" 
                           class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs xl:text-sm font-medium transition-colors {{ $isBooksActive ? 'bg-slate-900 text-white font-semibold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                            <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                                <path d="M6 6h10"/>
                                <path d="M6 10h10"/>
                            </svg>
                            <span>จัดการหนังสือ</span>
                            <span class="px-1.5 py-0.2 rounded text-[11px] font-semibold {{ $isBooksActive ? 'bg-slate-800 text-white' : 'bg-slate-200 text-slate-700' }}">
                                {{ $navBooksCount ?? 0 }}
                            </span>
                        </a>

                        <!-- 4. หนังสือที่ต้องการ -->
                        @php $isWantedActive = request()->routeIs('admin.wanted-books.*'); @endphp
                        <a href="{{ route('admin.wanted-books.index') }}" 
                           class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs xl:text-sm font-medium transition-colors {{ $isWantedActive ? 'bg-slate-900 text-white font-semibold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                            <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"/>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                            </svg>
                            <span>หนังสือที่ต้องการ</span>
                            <span class="px-1.5 py-0.2 rounded text-[11px] font-semibold {{ $isWantedActive ? 'bg-slate-800 text-white' : 'bg-slate-200 text-slate-700' }}">
                                {{ $navWantedBooksCount ?? 0 }}
                            </span>
                        </a>

                        <!-- 5. คำขอแลกเปลี่ยน -->
                        @php $isExchangeActive = request()->routeIs('admin.exchange-requests.*'); @endphp
                        <a href="{{ route('admin.exchange-requests.index') }}" 
                           class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs xl:text-sm font-medium transition-colors {{ $isExchangeActive ? 'bg-slate-900 text-white font-semibold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                            <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m16 3 4 4-4 4"/>
                                <path d="M20 7H4"/>
                                <path d="m8 21-4-4 4-4"/>
                                <path d="M4 17h16"/>
                            </svg>
                            <span>คำขอแลกเปลี่ยน</span>
                            <span class="px-1.5 py-0.2 rounded text-[11px] font-semibold {{ $isExchangeActive ? 'bg-slate-800 text-white' : 'bg-slate-200 text-slate-700' }}">
                                {{ $navExchangeRequestsCount ?? 0 }}
                            </span>
                        </a>

                        <!-- 6. รายงานปัญหา -->
                        @php $isReportsActive = request()->routeIs('admin.reports.*'); @endphp
                        <a href="{{ route('admin.reports.index') }}" 
                           class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs xl:text-sm font-medium transition-colors {{ $isReportsActive ? 'bg-slate-900 text-white font-semibold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                            <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/>
                                <line x1="12" y1="9" x2="12" y2="13"/>
                                <line x1="12" y1="17" x2="12.01" y2="17"/>
                            </svg>
                            <span>รายงานปัญหา</span>
                            @if(!empty($navReportsCount) && $navReportsCount > 0)
                                <span class="px-1.5 py-0.2 rounded text-[11px] font-semibold bg-rose-600 text-white">
                                    {{ $navReportsCount }}
                                </span>
                            @endif
                        </a>

                    @else
                        {{-- ==========================================
                            USER MENUS (สไตล์ทางการ)
                        =========================================== --}}

                        <!-- Dashboard -->
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="7" height="9" x="3" y="3" rx="1"/>
                                <rect width="7" height="5" x="14" y="3" rx="1"/>
                                <rect width="7" height="9" x="14" y="12" rx="1"/>
                                <rect width="7" height="5" x="3" y="16" rx="1"/>
                            </svg>
                            <span>Dashboard</span>
                        </x-nav-link>

                        <!-- Books -->
                        <x-nav-link :href="route('books.index')" :active="request()->routeIs('books.*')">
                            <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                                <path d="M6 6h10"/>
                                <path d="M6 10h10"/>
                            </svg>
                            <span>หนังสือของฉัน</span>
                        </x-nav-link>

                        <!-- Wanted Books -->
                        <x-nav-link :href="route('wanted-books.index')" :active="request()->routeIs('wanted-books.*')">
                            <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"/>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                            </svg>
                            <span>หนังสือที่ต้องการ</span>
                        </x-nav-link>

                        <!-- Matching -->
                        <x-nav-link :href="route('matching.index')" :active="request()->routeIs('matching.*')">
                            <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 18l6-6-6-6"/>
                                <circle cx="6" cy="12" r="3"/>
                                <circle cx="18" cy="12" r="3"/>
                            </svg>
                            <span>หนังสือที่ตรงกัน</span>
                        </x-nav-link>

                        <!-- Exchange Requests -->
                        <x-nav-link :href="route('exchange-requests.index')" :active="request()->routeIs('exchange-requests.*')">
                            <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m16 3 4 4-4 4"/>
                                <path d="M20 7H4"/>
                                <path d="m8 21-4-4 4-4"/>
                                <path d="M4 17h16"/>
                            </svg>
                            <span>คำขอแลกเปลี่ยน</span>
                        </x-nav-link>

                        <!-- Chats / Messages -->
                        <x-nav-link :href="route('chats.index')" :active="request()->routeIs('chats.*')">
                            <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                            </svg>
                            <span>ข้อความ</span>
                            @if(!empty($navUnreadChatCount) && $navUnreadChatCount > 0)
                                <span class="px-1.5 py-0.2 rounded text-[10px] font-semibold bg-slate-900 text-white">
                                    {{ $navUnreadChatCount }}
                                </span>
                            @endif
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden lg:flex items-center gap-3">
                <x-dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2.5 px-3 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 hover:border-slate-300 focus:outline-none transition-colors">
                            <!-- Avatar circle -->
                            @if(Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-7 h-7 rounded-full object-cover border border-slate-200">
                            @else
                                <div class="w-7 h-7 rounded-full bg-slate-800 text-white font-semibold text-xs flex items-center justify-center">
                                    {{ mb_substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @endif

                            <div class="text-start">
                                <div class="text-xs font-semibold text-slate-800 leading-tight">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="text-[10px] text-slate-500">
                                    {{ Auth::user()->role === 'admin' ? 'ผู้ดูแลระบบ' : 'สมาชิก' }}
                                </div>
                            </div>

                            <svg class="h-3.5 w-3.5 text-slate-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- User info header inside dropdown -->
                        <div class="px-4 py-3 border-b border-slate-100 bg-slate-50 flex items-center gap-2.5">
                            @if(Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full object-cover border border-slate-200">
                            @else
                                <div class="w-8 h-8 rounded-full bg-slate-800 text-white font-semibold text-xs flex items-center justify-center">
                                    {{ mb_substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @endif
                            <div class="min-w-0 flex-1">
                                <p class="text-xs font-semibold text-slate-800 truncate">{{ Auth::user()->name }}</p>
                                <p class="text-[11px] text-slate-500 truncate">{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        <!-- If Admin, show link to Switch to User View / Dashboard -->
                        @if(Auth::user()->role === 'admin')
                            <x-dropdown-link :href="route('dashboard')" class="flex items-center gap-2 text-slate-700 hover:bg-slate-50">
                                <svg class="w-4 h-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                    <polyline points="9 22 9 12 15 12 15 22"/>
                                </svg>
                                <span>{{ __('หน้า Dashboard สมาชิก') }}</span>
                            </x-dropdown-link>
                            <div class="border-t border-slate-100 my-1"></div>
                        @endif

                        <!-- Profile -->
                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-2 text-slate-700 hover:bg-slate-50">
                            <svg class="w-4 h-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            <span>{{ __('ตั้งค่าโปรไฟล์') }}</span>
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center gap-2 text-rose-600 hover:bg-rose-50">
                                <svg class="w-4 h-4 text-rose-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                    <polyline points="16 17 21 12 16 7"/>
                                    <line x1="21" y1="12" x2="9" y2="12"/>
                                </svg>
                                <span>{{ __('ออกจากระบบ') }}</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-me-2 flex items-center lg:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-slate-500 hover:text-slate-700 hover:bg-slate-100 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden lg:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-5 space-y-1 shadow-md">
        @if(Auth::user()->role === 'admin')
            <!-- Admin Mobile Menu -->
            <div class="px-2 py-1 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                ระบบจัดการผู้ดูแลระบบ (Admin)
            </div>

            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="7" height="9" x="3" y="3" rx="1"/>
                    <rect width="7" height="5" x="14" y="3" rx="1"/>
                    <rect width="7" height="9" x="14" y="12" rx="1"/>
                    <rect width="7" height="5" x="3" y="16" rx="1"/>
                </svg>
                <span>ภาพรวมระบบ</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                <span>จัดการสมาชิก ({{ $navUsersCount ?? 0 }})</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.books.index')" :active="request()->routeIs('admin.books.*')">
                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                    <path d="M6 6h10"/>
                    <path d="M6 10h10"/>
                </svg>
                <span>จัดการหนังสือ ({{ $navBooksCount ?? 0 }})</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.wanted-books.index')" :active="request()->routeIs('admin.wanted-books.*')">
                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <span>หนังสือที่ต้องการ ({{ $navWantedBooksCount ?? 0 }})</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.exchange-requests.index')" :active="request()->routeIs('admin.exchange-requests.*')">
                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m16 3 4 4-4 4"/>
                    <path d="M20 7H4"/>
                    <path d="m8 21-4-4 4-4"/>
                    <path d="M4 17h16"/>
                </svg>
                <span>คำขอแลกเปลี่ยน ({{ $navExchangeRequestsCount ?? 0 }})</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.reports.index')" :active="request()->routeIs('admin.reports.*')">
                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/>
                    <line x1="12" y1="9" x2="12" y2="13"/>
                    <line x1="12" y1="17" x2="12.01" y2="17"/>
                </svg>
                <span>รายงานปัญหา {{ !empty($navReportsCount) && $navReportsCount > 0 ? "({$navReportsCount})" : '' }}</span>
            </x-responsive-nav-link>

        @else
            <!-- User Mobile Menu -->
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="7" height="9" x="3" y="3" rx="1"/>
                    <rect width="7" height="5" x="14" y="3" rx="1"/>
                    <rect width="7" height="9" x="14" y="12" rx="1"/>
                    <rect width="7" height="5" x="3" y="16" rx="1"/>
                </svg>
                <span>Dashboard</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('books.index')" :active="request()->routeIs('books.*')">
                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                    <path d="M6 6h10"/>
                    <path d="M6 10h10"/>
                </svg>
                <span>หนังสือของฉัน</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('wanted-books.index')" :active="request()->routeIs('wanted-books.*')">
                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <span>หนังสือที่ต้องการ</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('matching.index')" :active="request()->routeIs('matching.*')">
                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 18l6-6-6-6"/>
                    <circle cx="6" cy="12" r="3"/>
                    <circle cx="18" cy="12" r="3"/>
                </svg>
                <span>หนังสือที่ตรงกัน</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('exchange-requests.index')" :active="request()->routeIs('exchange-requests.*')">
                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m16 3 4 4-4 4"/>
                    <path d="M20 7H4"/>
                    <path d="m8 21-4-4 4-4"/>
                    <path d="M4 17h16"/>
                </svg>
                <span>คำขอแลกเปลี่ยน</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('chats.index')" :active="request()->routeIs('chats.*')">
                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                </svg>
                <span>ข้อความ</span>
                @if(!empty($navUnreadChatCount) && $navUnreadChatCount > 0)
                    <span class="ml-2 px-1.5 py-0.2 rounded text-xs font-semibold bg-slate-900 text-white">
                        {{ $navUnreadChatCount }}
                    </span>
                @endif
            </x-responsive-nav-link>
        @endif

        <!-- Responsive User Profile -->
        <div class="pt-4 mt-3 border-t border-slate-200">
            <div class="flex items-center gap-3 px-3 py-2 bg-slate-50 rounded-lg mb-2">
                @if(Auth::user()->avatar)
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full object-cover border border-slate-200">
                @else
                    <div class="w-8 h-8 rounded-full bg-slate-800 text-white font-semibold text-xs flex items-center justify-center">
                        {{ mb_substr(Auth::user()->name, 0, 1) }}
                    </div>
                @endif
                <div>
                    <div class="font-semibold text-sm text-slate-900 leading-tight">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-slate-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="space-y-1">
                @if(Auth::user()->role === 'admin')
                    <x-responsive-nav-link :href="route('dashboard')" class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                        <span>{{ __('หน้า Dashboard สมาชิก') }}</span>
                    </x-responsive-nav-link>
                @endif

                <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <span>{{ __('ตั้งค่าโปรไฟล์') }}</span>
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center gap-2 text-rose-600">
                        <svg class="w-4 h-4 text-rose-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                            <polyline points="16 17 21 12 16 7"/>
                            <line x1="21" y1="12" x2="9" y2="12"/>
                        </svg>
                        <span>{{ __('ออกจากระบบ') }}</span>
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>