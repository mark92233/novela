<!DOCTYPE html>
<html lang="en" id="htmlRoot" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="#FAF8F5">
    <title>Reading Room - Gone too close too fast</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['Lora', 'serif'],
                    }
                }
            }
        };
    </script>

    <style>
        :root {
            --bg: #FAF8F5;
            --surface: rgba(255, 255, 255, .76);
            --text: #18181B;
            --muted: #777783;
            --accent: #2563EB;
            --accent-soft: rgba(37, 99, 235, .12);
            --border: rgba(37, 99, 235, .13);
        }

        .dark {
            --bg: #0A0B0E;
            --surface: rgba(20, 22, 31, .78);
            --text: #F4F4F5;
            --muted: #A1A1AA;
            --accent: #F43F75;
            --accent-soft: rgba(244, 63, 117, .12);
            --border: rgba(244, 63, 117, .14);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }

        body {
            background: var(--bg);
            color: var(--text);
            overflow-x: hidden;
            transition: background .5s ease, color .5s ease;
        }

        /* ==================================
           AMBIENT BACKGROUND
        ================================== */

        .ambient-background {
            position: fixed;
            inset: 0;
            z-index: -2;
            overflow: hidden;
            pointer-events: none;
            isolation: isolate;
        }

        .ambient-background::after {
            content: "";
            position: absolute;
            inset: 0;
            opacity: .2;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.16'/%3E%3C/svg%3E");
            mix-blend-mode: multiply;
        }

        .dark .ambient-background::after {
            mix-blend-mode: screen;
            opacity: .1;
        }

        .ambient-orb {
            position: absolute;
            width: 450px;
            height: 450px;
            border-radius: 50%;
            background: #3B82F6;
            filter: blur(105px);
            opacity: .18;
            animation: drift 18s ease-in-out infinite alternate;
            will-change: transform;
        }

        .dark .ambient-orb {
            background: #E11D65;
            opacity: .16;
        }

        .orb-one {
            top: -180px;
            left: -130px;
        }

        .orb-two {
            top: 25%;
            right: -220px;
            width: 520px;
            height: 520px;
            animation-duration: 23s;
            animation-delay: -6s;
        }

        .orb-three {
            bottom: -230px;
            left: 20%;
            width: 500px;
            height: 500px;
            animation-duration: 25s;
            animation-delay: -12s;
        }

        .ambient-grid {
            position: absolute;
            inset: 0;
            opacity: .035;
            background-image:
                linear-gradient(to right, currentColor 1px, transparent 1px),
                linear-gradient(to bottom, currentColor 1px, transparent 1px);
            background-size: 70px 70px;
            mask-image: linear-gradient(to bottom, black, transparent 85%);
        }

        @keyframes drift {
            0% {
                transform: translate(0, 0) scale(1);
            }
            50% {
                transform: translate(65px, 60px) scale(1.1);
            }
            100% {
                transform: translate(-35px, 100px) scale(.94);
            }
        }

        /* ==================================
           PARTICLES
        ================================== */

        .particle {
            position: absolute;
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: var(--accent);
            opacity: .3;
            animation: particleFloat linear infinite;
        }

        @keyframes particleFloat {
            0% {
                transform: translateY(110vh) translateX(0);
                opacity: 0;
            }
            15% {
                opacity: .35;
            }
            85% {
                opacity: .2;
            }
            100% {
                transform: translateY(-15vh) translateX(45px);
                opacity: 0;
            }
        }

        /* ==================================
           HEADER
        ================================== */

        .site-header {
            background: var(--surface);
            border-color: var(--border);
            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);
        }

        .header-link {
            position: relative;
        }

        .header-link::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            height: 2px;
            width: 0;
            background: var(--accent);
            transition: width .3s ease;
        }

        .header-link:hover::after {
            width: 100%;
        }

        /* ==================================
           INTRO
        ================================== */

        .intro-enter {
            animation: fadeUp .9s cubic-bezier(.2, .8, .2, 1) both;
        }

        .intro-delay-1 {
            animation-delay: .15s;
        }

        .intro-delay-2 {
            animation-delay: .3s;
        }

        .intro-delay-3 {
            animation-delay: .45s;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .accent-text {
            color: var(--accent);
        }

        /* ==================================
           READING PROGRESS
        ================================== */

        .reading-progress {
            height: 2px;
            width: 100%;
            background: transparent;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        #progressBar {
            height: 100%;
            width: 0%;
            background: var(--accent);
            transition: width .1s linear;
        }

        /* ==================================
           EPILOGUE CARD
        ================================== */

        .epilogue-card {
            position: relative;
            overflow: hidden;
            background: var(--surface);
            border: 1px solid var(--border);
            backdrop-filter: blur(20px);
            transition: transform .4s ease, border-color .4s ease, box-shadow .4s ease;
        }

        .epilogue-card::before {
            content: "";
            position: absolute;
            top: -100px;
            right: -80px;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            background: var(--accent-soft);
            transition: transform .6s ease;
            pointer-events: none;
        }

        .epilogue-card:hover {
            transform: translateY(-6px);
            border-color: var(--accent);
            box-shadow: 0 25px 65px var(--accent-soft);
        }

        .epilogue-card:hover::before {
            transform: scale(1.5);
        }

        .epilogue-icon {
            transition: transform .5s ease;
        }

        .epilogue-card:hover .epilogue-icon {
            transform: rotate(-8deg) scale(1.08);
        }

        /* ==================================
           CHAPTER CARDS
        ================================== */

        .chapter-card {
            position: relative;
            display: block;
            overflow: hidden;
            opacity: 0;
            background: var(--surface);
            border: 1px solid var(--border);
            backdrop-filter: blur(16px);
            animation: chapterEnter .65s cubic-bezier(.2, .8, .2, 1) forwards;
            transition:
                transform .35s ease,
                border-color .35s ease,
                box-shadow .35s ease,
                background .35s ease;
        }

        @keyframes chapterEnter {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .chapter-card:hover {
            transform: translateY(-4px);
            border-color: var(--accent);
            box-shadow: 0 15px 40px var(--accent-soft);
        }

        .chapter-number {
            background: var(--accent-soft);
            color: var(--accent);
            transition: background .3s ease, color .3s ease, transform .3s ease;
        }

        .chapter-card:hover .chapter-number {
            background: var(--accent);
            color: white;
            transform: rotate(-5deg);
        }

        .chapter-title {
            color: var(--text);
            transition: color .3s ease;
        }

        .chapter-card:hover .chapter-title {
            color: var(--accent);
        }

        .arrow-icon {
            color: var(--muted);
            transition: color .3s ease, transform .3s ease;
        }

        .chapter-card:hover .arrow-icon {
            color: var(--accent);
            transform: translateX(6px);
        }

        .chapter-card::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 3px;
            background: var(--accent);
            transform: scaleY(0);
            transform-origin: bottom;
            transition: transform .3s ease;
        }

        .chapter-card:hover::after {
            transform: scaleY(1);
        }

        /* ==================================
           SECTION REVEAL
        ================================== */

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity .8s ease, transform .8s cubic-bezier(.2, .8, .2, 1);
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ==================================
           FOOTER
        ================================== */

        .footer-line {
            height: 2px;
            width: 45px;
            background: var(--accent);
            opacity: .6;
            margin: 0 auto 15px;
        }

        /* ==================================
           ACCESSIBILITY
        ================================== */

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
                scroll-behavior: auto !important;
            }

            .chapter-card {
                opacity: 1;
            }

            .reveal {
                opacity: 1;
                transform: none;
            }
        }
    </style>
</head>

<body class="min-h-screen flex flex-col font-sans antialiased selection:bg-blue-500 selection:text-white dark:selection:bg-rose-500">

    <!-- AMBIENT BACKGROUND -->
    <div class="ambient-background" aria-hidden="true">
        <div class="ambient-orb orb-one"></div>
        <div class="ambient-orb orb-two"></div>
        <div class="ambient-orb orb-three"></div>
        <div class="ambient-grid"></div>
        <div id="particles"></div>
    </div>


    <!-- HEADER -->
    <header class="site-header sticky top-0 z-50 border-b">
        <div class="max-w-5xl mx-auto px-5 sm:px-8 h-[68px] flex items-center justify-between">

            <a href="/index" class="flex items-center gap-3 group">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center text-white font-serif font-bold text-lg shadow-lg"
                     style="background:var(--accent)">
                    G.
                </div>

                <div class="flex flex-col">
                    <span class="font-serif text-sm font-bold tracking-tight">
                        Gone too close too fast
                    </span>
                    <span class="text-[9px] uppercase tracking-[.2em] opacity-50">
                        The Reading Room
                    </span>
                </div>
            </a>

            <div class="flex items-center gap-4 sm:gap-6">

                <a href="/index"
                   class="header-link hidden sm:block text-xs font-semibold opacity-60 hover:opacity-100">
                    ← Back to home
                </a>

                <button
                    type="button"
                    onclick="toggleTheme()"
                    id="themeToggle"
                    aria-label="Toggle color theme"
                    class="w-10 h-10 rounded-full flex items-center justify-center border transition-all hover:scale-110"
                    style="border-color:var(--border);background:var(--accent-soft);color:var(--accent)">

                    <svg id="sunIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="4"></circle>
                        <path stroke-linecap="round" d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42"></path>
                    </svg>

                    <svg id="moonIcon" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.9 13A9 9 0 0111 3.1 9 9 0 1020.9 13z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="reading-progress">
            <div id="progressBar"></div>
        </div>
    </header>


    <!-- MAIN -->
    <main class="flex-grow w-full max-w-5xl mx-auto px-5 sm:px-8 py-14 sm:py-20">

        <!-- INTRO -->
        <section class="intro-enter mb-14 sm:mb-20">

            <div class="intro-delay-1 intro-enter flex items-center gap-3 mb-6">
                <span class="w-9 h-px" style="background:var(--accent)"></span>

                <span class="text-[10px] font-extrabold uppercase tracking-[.3em] accent-text">
                    Your reading journey
                </span>
            </div>

            <h1 id="bookTitle"
                class="intro-delay-2 intro-enter font-serif text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight leading-tight mb-5">
                Gone too close
                <span class="italic accent-text">too fast.</span>
            </h1>

            <div class="intro-delay-3 intro-enter flex flex-wrap items-center gap-3">

                <span id="chapterCount"
                      class="text-xs font-semibold opacity-60">
                    Loading chapters...
                </span>

                <span class="w-1 h-1 rounded-full" style="background:var(--accent)"></span>

                <span class="text-xs opacity-50">
                    A story worth staying for.
                </span>
            </div>

            <p class="intro-enter mt-7 font-serif italic text-sm sm:text-base opacity-50 max-w-xl leading-relaxed"
               style="animation-delay:.55s">
                Every chapter brings you a little closer to understanding what happened between them.
            </p>

        </section>


        <!-- EPILOGUE -->
        <section class="reveal mb-16">

            <div class="flex items-center justify-between mb-5">
                <div>
                    <span class="text-[10px] uppercase tracking-[.25em] font-extrabold accent-text">
                        Beyond the final page
                    </span>
                </div>

                <span class="text-[9px] uppercase tracking-[.2em] font-bold opacity-40">
                    Special reading
                </span>
            </div>


            <a href="/epilogue"
               class="epilogue-card block rounded-[2rem] p-6 sm:p-9 group">

                <div class="relative z-10">

                    <div class="flex justify-between items-start mb-7">

                        <div class="epilogue-icon w-14 h-14 rounded-2xl flex items-center justify-center"
                             style="background:var(--accent-soft);color:var(--accent)">

                            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>

                        <span class="px-3 py-1.5 rounded-full text-[9px] uppercase font-extrabold tracking-[.2em]"
                              style="background:var(--accent-soft);color:var(--accent)">
                            Epilogue
                        </span>

                    </div>

                    <h2 class="font-serif text-2xl sm:text-3xl font-bold mb-3">
                        One Last Thing
                    </h2>

                    <p class="font-serif italic text-sm sm:text-base leading-relaxed opacity-55 max-w-lg">
                        "Some stories don't really end. They simply leave us with something to carry long after the last page."
                    </p>

                    <div class="flex justify-between items-center mt-8 pt-5 border-t"
                         style="border-color:var(--border)">

                        <span class="text-xs font-bold accent-text">
                            Read the epilogue
                        </span>

                        <span class="arrow-icon text-xl">→</span>
                    </div>

                </div>

            </a>

        </section>


        <!-- CHAPTERS -->
        <section class="reveal">

            <div class="flex items-end justify-between mb-7">

                <div>
                    <span class="text-[10px] uppercase tracking-[.25em] font-extrabold opacity-40">
                        The story
                    </span>

                    <h2 class="font-serif text-2xl sm:text-3xl font-bold mt-2">
                        Chapters<span class="accent-text">.</span>
                    </h2>
                </div>

                <span class="text-[9px] font-bold uppercase tracking-[.2em] opacity-40">
                    Read in order
                </span>

            </div>


            <!-- CHAPTER LIST -->
            <div id="chapterList" class="space-y-3">

                <div class="text-center py-12 opacity-50 text-sm">
                    Preparing your reading experience...
                </div>

            </div>

            <!-- DATABASE DIAGNOSTICS -->
            <div id="databaseStatus" class="hidden mt-5 text-[10px] opacity-50"></div>

        </section>

    </main>


    <!-- FOOTER -->
    <footer class="border-t mt-16"
            style="border-color:var(--border);background:var(--surface)">

        <div class="max-w-5xl mx-auto px-5 py-10 text-center">

            <div class="footer-line"></div>

            <p class="font-serif italic text-sm opacity-60">
                "Every page holds a little piece of us."
            </p>

            <p class="text-[10px] font-bold uppercase tracking-[.2em] opacity-35 mt-4">
                Built with love & magic. © <?php echo date('Y'); ?>
            </p>

        </div>
    </footer>


    <!-- DATABASE -->
    <script src="/database.js"></script>


    <script>
        /* ==================================
           THEME MANAGEMENT
        ================================== */

        const htmlRoot = document.getElementById('htmlRoot');

        function applyTheme(theme) {
            htmlRoot.classList.toggle('dark', theme === 'dark');

            document.getElementById('sunIcon')
                .classList.toggle('hidden', theme !== 'dark');

            document.getElementById('moonIcon')
                .classList.toggle('hidden', theme === 'dark');

            localStorage.setItem('theme', theme);

            document.querySelector('meta[name="theme-color"]')
                .setAttribute('content', theme === 'dark' ? '#0A0B0E' : '#FAF8F5');
        }

        const savedTheme = localStorage.getItem('theme');

        const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches
            ? 'dark'
            : 'light';

        applyTheme(savedTheme || systemTheme);

        function toggleTheme() {
            const isDark = htmlRoot.classList.contains('dark');
            applyTheme(isDark ? 'light' : 'dark');
        }


        /* ==================================
           AMBIENT PARTICLES
        ================================== */

        const particleContainer = document.getElementById('particles');

        for (let i = 0; i < 24; i++) {
            const particle = document.createElement('span');

            particle.className = 'particle';
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.animationDuration = `${14 + Math.random() * 20}s`;
            particle.style.animationDelay = `${Math.random() * -25}s`;

            particleContainer.appendChild(particle);
        }


        /* ==================================
           SCROLL REVEAL
        ================================== */

        const revealElements = document.querySelectorAll('.reveal');

        if ('IntersectionObserver' in window) {
            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: .12,
                rootMargin: '0px 0px -35px 0px'
            });

            revealElements.forEach(element => revealObserver.observe(element));
        } else {
            revealElements.forEach(element => element.classList.add('visible'));
        }


        /* ==================================
           READING PROGRESS
        ================================== */

        const progressBar = document.getElementById('progressBar');

        function updateProgress() {
            const scrollableHeight = document.documentElement.scrollHeight - window.innerHeight;

            const progress = scrollableHeight > 0
                ? (window.scrollY / scrollableHeight) * 100
                : 0;

            progressBar.style.width = `${Math.min(progress, 100)}%`;
        }

        window.addEventListener('scroll', updateProgress, { passive: true });
        window.addEventListener('resize', updateProgress);
        updateProgress();


        /* ==================================
           DATABASE RESOLVER
        ================================== */

        function getNovelDatabase() {

            // Structure 1:
            // const novelData = {
            //     title: "...",
            //     chapters: [...]
            // };

            if (typeof novelData !== 'undefined' && novelData !== null) {
                return novelData;
            }

            // Structure 2:
            // const novel = {
            //     title: "...",
            //     chapters: [...]
            // };

            if (typeof novel !== 'undefined' && novel !== null) {
                return novel;
            }

            return null;
        }


        /* ==================================
           DATABASE RENDERER
        ================================== */

        const bookTitleEl = document.getElementById('bookTitle');
        const chapterCountEl = document.getElementById('chapterCount');
        const chapterListEl = document.getElementById('chapterList');
        const databaseStatus = document.getElementById('databaseStatus');


        function showDatabaseError(message) {
            bookTitleEl.textContent = 'Something went wrong';
            chapterCountEl.textContent = 'Unable to load chapters';

            chapterListEl.innerHTML = '';

            const error = document.createElement('div');

            error.className = 'rounded-2xl border border-red-400/30 bg-red-500/5 p-6 text-center';

            const title = document.createElement('p');
            title.className = 'font-semibold text-sm text-red-500';
            title.textContent = message;

            const hint = document.createElement('p');
            hint.className = 'text-xs opacity-60 mt-2';
            hint.textContent = 'Check your database.js file and browser console for more information.';

            error.append(title, hint);
            chapterListEl.appendChild(error);

            console.error('[Novel Database]', message);
        }


        function renderEmptyState() {
            const empty = document.createElement('div');

            empty.className = 'rounded-2xl border border-dashed p-12 text-center';
            empty.style.borderColor = 'var(--border)';

            const message = document.createElement('p');
            message.className = 'font-serif italic opacity-50';
            message.textContent = 'The story is waiting to be written...';

            empty.appendChild(message);
            chapterListEl.appendChild(empty);
        }


        function renderChapter(chapter, index) {

            const formattedNumber = String(index + 1).padStart(2, '0');

            // Use the original chapter ID.
            // Fallback is only used when no ID exists.
            const chapterId = chapter.id ?? index + 1;

            const link = document.createElement('a');

            link.href = `/reading?id=${encodeURIComponent(chapterId)}`;

            link.className = 'chapter-card rounded-2xl p-4 sm:p-5 group';

            link.style.animationDelay = `${index * 90}ms`;

            link.setAttribute('aria-label', `Read Chapter ${index + 1}: ${chapter.title || 'Untitled'}`);

            const container = document.createElement('div');
            container.className = 'flex items-center justify-between gap-4';

            const left = document.createElement('div');
            left.className = 'flex items-center gap-4 min-w-0';

            // Number
            const number = document.createElement('div');

            number.className = 'chapter-number w-12 h-12 rounded-xl shrink-0 flex items-center justify-center text-xs font-extrabold';

            number.textContent = formattedNumber;

            // Information
            const info = document.createElement('div');
            info.className = 'min-w-0';

            const title = document.createElement('h3');
            title.className = 'chapter-title font-semibold text-sm sm:text-base truncate';

            title.textContent = chapter.title || `Chapter ${index + 1}`;

            const snippet = document.createElement('p');
            snippet.className = 'text-xs opacity-50 font-serif mt-1 truncate';

            snippet.textContent = chapter.snippet || 'Continue reading...';

            info.append(title, snippet);

            // Arrow
            const arrow = document.createElement('span');

            arrow.className = 'arrow-icon text-xl shrink-0';
            arrow.textContent = '→';

            left.append(number, info);
            container.append(left, arrow);
            link.appendChild(container);

            chapterListEl.appendChild(link);
        }


        function renderChapters() {

            const database = getNovelDatabase();

            if (!database) {
                showDatabaseError(
                    'Database variable not found. Expected novelData or novel.'
                );
                return;
            }

            // Explicit array validation
            if (!Array.isArray(database.chapters)) {
                showDatabaseError(
                    'The chapters property exists, but it is not a valid array.'
                );

                console.error('Received database object:', database);
                return;
            }

            const chapters = database.chapters;

            // Diagnostics: show what database.js actually provides.
            console.group('[Novel Database Diagnostics]');
            console.log('Database title:', database.title);
            console.log('Raw chapter count:', chapters.length);
            console.log('Chapter records:', chapters);
            console.groupEnd();

            // Title
            bookTitleEl.textContent = database.title || 'Gone too close too fast';

            // Count the actual array length.
            chapterCountEl.textContent =
                `${chapters.length} ${chapters.length === 1 ? 'Chapter' : 'Chapters'} Available`;

            chapterListEl.innerHTML = '';

            if (chapters.length === 0) {
                renderEmptyState();
                return;
            }

            // Check for invalid chapter records without silently limiting the list.
            const invalidRecords = chapters.filter(chapter =>
                !chapter || typeof chapter !== 'object' || Array.isArray(chapter)
            );

            if (invalidRecords.length > 0) {
                console.warn(
                    `${invalidRecords.length} invalid chapter record(s) found.`,
                    invalidRecords
                );
            }

            // Check duplicate IDs
            const ids = chapters
                .filter(chapter => chapter && chapter.id !== undefined)
                .map(chapter => String(chapter.id));

            const duplicateIds = ids.filter((id, index) => ids.indexOf(id) !== index);

            if (duplicateIds.length > 0) {
                console.warn('Duplicate chapter IDs found:', [...new Set(duplicateIds)]);
            }

            let renderedCount = 0;

            // IMPORTANT:
            // No slice(0, 4), no hardcoded chapter limit.
            // Iterate through the entire array.
            chapters.forEach((chapter, index) => {

                if (!chapter || typeof chapter !== 'object' || Array.isArray(chapter)) {
                    return;
                }

                renderChapter(chapter, index);
                renderedCount++;
            });

            // Diagnostics
            databaseStatus.classList.remove('hidden');

            databaseStatus.textContent =
                `Database records: ${chapters.length} · Rendered chapters: ${renderedCount}`;

            console.log('[Novel Database] Rendered chapters:', renderedCount);
        }


        /* ==================================
           INITIALIZE
        ================================== */

        renderChapters();

    </script>

</body>
</html>
