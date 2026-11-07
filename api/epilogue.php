<?php
    $bookTitle = "Gone too close too fast";
    $epilogueTitle = "One Last Thing";
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth" id="htmlRoot">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#FAF8F5" id="themeColor">

    <title>Epilogue - <?php echo htmlspecialchars($bookTitle); ?></title>

    <script src="https://cdn.tailwindcss.com"></script>

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
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            overflow-x: hidden;
        }

        /* =========================================
           AMBIENT BACKGROUND
        ========================================= */

        .ambient {
            position: fixed;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            filter: blur(120px);
            pointer-events: none;
            z-index: -3;
            opacity: .12;
            animation: ambientFloat 14s ease-in-out infinite alternate;
        }

        .ambient-one {
            background: #2563EB;
            top: -230px;
            right: -150px;
        }

        .ambient-two {
            background: #60A5FA;
            bottom: -230px;
            left: -160px;
            animation-delay: -5s;
        }

        .dark .ambient-one {
            background: #F43F75;
            opacity: .10;
        }

        .dark .ambient-two {
            background: #BE123C;
            opacity: .09;
        }

        @keyframes ambientFloat {
            from {
                transform: translate3d(0, 0, 0) scale(1);
            }

            to {
                transform: translate3d(35px, 45px, 0) scale(1.15);
            }
        }

        /* Subtle background grid */

        .background-grid {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: -2;
            opacity: .025;
            background-image:
                linear-gradient(to right, currentColor 1px, transparent 1px),
                linear-gradient(to bottom, currentColor 1px, transparent 1px);
            background-size: 65px 65px;
            mask-image: linear-gradient(to bottom, black, transparent 85%);
        }

        .dark .background-grid {
            opacity: .045;
        }

        /* Floating particles */

        .particles {
            position: fixed;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: #2563EB;
            opacity: 0;
            animation: particleFloat linear infinite;
        }

        .dark .particle {
            background: #FB7185;
        }

        @keyframes particleFloat {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }

            15% {
                opacity: .35;
            }

            85% {
                opacity: .2;
            }

            100% {
                transform: translateY(-100vh);
                opacity: 0;
            }
        }

        /* =========================================
           ANIMATIONS
        ========================================= */

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(28px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes breathe {
            0%, 100% {
                opacity: .45;
                transform: scale(.9);
            }

            50% {
                opacity: 1;
                transform: scale(1.1);
            }
        }

        @keyframes lineReveal {
            from {
                transform: scaleX(0);
            }

            to {
                transform: scaleX(1);
            }
        }

        .intro-reveal {
            opacity: 0;
            animation: fadeUp .9s cubic-bezier(.2,.8,.2,1) forwards;
        }

        .delay-1 { animation-delay: 120ms; }
        .delay-2 { animation-delay: 240ms; }
        .delay-3 { animation-delay: 360ms; }
        .delay-4 { animation-delay: 480ms; }

        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition:
                opacity .8s cubic-bezier(.2,.8,.2,1),
                transform .8s cubic-bezier(.2,.8,.2,1);
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* =========================================
           HEADER
        ========================================= */

        .glass-header {
            background: rgba(250, 248, 245, .78);
            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);
            border-bottom: 1px solid rgba(37, 99, 235, .09);
        }

        .dark .glass-header {
            background: rgba(10, 11, 14, .78);
            border-bottom-color: rgba(244, 63, 117, .12);
        }

        .theme-button {
            transition: transform .3s ease, background .3s ease;
        }

        .theme-button:hover {
            transform: rotate(12deg) scale(1.08);
        }

        /* =========================================
           READING CONTENT
        ========================================= */

        .reading-content {
            font-family: 'Lora', serif;
            font-size: 16px;
            line-height: 2.05;
            color: #52525B;
            letter-spacing: .005em;
        }

        .dark .reading-content {
            color: #A1A1AA;
        }

        .reading-content p {
            margin-bottom: 1.8rem;
        }

        .reading-content p:last-child {
            margin-bottom: 0;
        }

        .reading-content em {
            color: #2563EB;
            font-style: italic;
        }

        .dark .reading-content em {
            color: #FB7185;
        }

        .reading-content strong {
            color: #27272A;
            font-weight: 600;
        }

        .dark .reading-content strong {
            color: #E4E4E7;
        }

        /* =========================================
           SCENE MARKERS
        ========================================= */

        .scene-marker {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 30px;
        }

        .scene-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #2563EB;
            box-shadow: 0 0 0 5px rgba(37, 99, 235, .09);
            animation: breathe 3s ease-in-out infinite;
        }

        .dark .scene-dot {
            background: #F43F75;
            box-shadow: 0 0 0 5px rgba(244, 63, 117, .1);
        }

        /* =========================================
           INTERNAL THOUGHTS
        ========================================= */

        .inner-thought {
            position: relative;
            padding: 25px 28px;
            border-left: 2px solid rgba(37, 99, 235, .45);
            background: linear-gradient(
                110deg,
                rgba(37, 99, 235, .055),
                rgba(37, 99, 235, .015)
            );
            border-radius: 0 16px 16px 0;
            margin: 2rem 0;
            overflow: hidden;
        }

        .inner-thought::after {
            content: "“";
            position: absolute;
            top: -25px;
            right: 18px;
            font-family: 'Lora', serif;
            font-size: 100px;
            line-height: 1;
            color: rgba(37, 99, 235, .07);
            pointer-events: none;
        }

        .dark .inner-thought {
            border-left-color: rgba(244, 63, 117, .55);
            background: linear-gradient(
                110deg,
                rgba(244, 63, 117, .07),
                rgba(244, 63, 117, .015)
            );
        }

        .dark .inner-thought::after {
            color: rgba(244, 63, 117, .09);
        }

        /* =========================================
           DIALOGUE
        ========================================= */

        .dialogue {
            font-family: 'Lora', serif;
            font-style: italic;
            font-size: clamp(1.15rem, 3vw, 1.4rem);
            line-height: 1.8;
            color: #2563EB;
            text-align: center;
            padding: 25px 15px;
            margin: 2rem 0;
        }

        .dark .dialogue {
            color: #FB7185;
        }

        /* =========================================
           SCENE DIVIDER
        ========================================= */

        .scene-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            margin: 75px 0;
        }

        .scene-divider::before,
        .scene-divider::after {
            content: "";
            height: 1px;
            flex: 1;
            background: linear-gradient(
                to right,
                transparent,
                rgba(37, 99, 235, .3)
            );
        }

        .scene-divider::after {
            transform: rotate(180deg);
        }

        .dark .scene-divider::before,
        .dark .scene-divider::after {
            background: linear-gradient(
                to right,
                transparent,
                rgba(244, 63, 117, .3)
            );
        }

        .divider-symbol {
            animation: breathe 4s ease-in-out infinite;
        }

        /* =========================================
           CLOSING
        ========================================= */

        .closing-symbol {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 62px;
            height: 62px;
            border-radius: 50%;
            border: 1px solid rgba(37, 99, 235, .18);
            background: rgba(37, 99, 235, .045);
            color: #2563EB;
            font-size: 22px;
        }

        .dark .closing-symbol {
            border-color: rgba(244, 63, 117, .22);
            background: rgba(244, 63, 117, .06);
            color: #FB7185;
        }

        /* =========================================
           NAVIGATION CARD
        ========================================= */

        .navigation-card {
            position: relative;
            overflow: hidden;
            transition:
                transform .35s ease,
                border-color .35s ease,
                box-shadow .35s ease;
        }

        .navigation-card::before {
            content: "";
            position: absolute;
            inset: 0 auto 0 0;
            width: 3px;
            background: #2563EB;
            transform: scaleY(0);
            transform-origin: bottom;
            transition: transform .35s ease;
        }

        .dark .navigation-card::before {
            background: #F43F75;
        }

        .navigation-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 55px rgba(37, 99, 235, .07);
        }

        .navigation-card:hover::before {
            transform: scaleY(1);
        }

        .dark .navigation-card:hover {
            box-shadow: 0 20px 55px rgba(244, 63, 117, .06);
        }

        .back-link {
            transition: all .3s ease;
        }

        .back-link:hover {
            transform: translateY(-2px);
        }

        .back-link:hover .back-arrow {
            transform: translateX(-5px);
        }

        .back-arrow {
            transition: transform .3s ease;
        }

        /* =========================================
           PROGRESS
        ========================================= */

        #progressBar {
            width: 0;
            transition: width .1s linear;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media(max-width: 640px) {
            .reading-content {
                font-size: 15px;
                line-height: 2;
            }

            .scene-divider {
                margin: 52px 0;
            }

            .inner-thought {
                padding: 20px;
            }

            .ambient {
                width: 280px;
                height: 280px;
            }
        }

        @media(prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
                scroll-behavior: auto !important;
            }

            .reveal,
            .intro-reveal {
                opacity: 1;
                transform: none;
            }
        }
    </style>
</head>

<body class="bg-[#FAF8F5] dark:bg-[#0A0B0E] text-[#18181B] dark:text-gray-100 font-sans antialiased min-h-screen">

    <!-- AMBIENT BACKGROUND -->

    <div class="ambient ambient-one"></div>
    <div class="ambient ambient-two"></div>
    <div class="background-grid"></div>

    <div class="particles" id="particles"></div>

    <!-- READING PROGRESS -->

    <div class="fixed top-0 left-0 w-full h-[2px] z-[60] bg-blue-100/60 dark:bg-gray-800/60">
        <div id="progressBar" class="h-full bg-blue-600 dark:bg-rose-500"></div>
    </div>

    <!-- HEADER -->

    <header class="glass-header sticky top-0 z-50">

        <div class="max-w-4xl mx-auto px-5 h-[68px] flex items-center justify-between">

            <a href="content.php"
                class="group flex items-center gap-3 text-sm font-semibold text-blue-600 dark:text-rose-400">

                <span class="w-9 h-9 rounded-xl flex items-center justify-center bg-blue-50 dark:bg-rose-500/10 border border-blue-100 dark:border-rose-500/20 transition-all group-hover:-translate-x-1">
                    ←
                </span>

                <span>Contents</span>

            </a>

            <div class="flex items-center gap-4">

                <span class="hidden sm:block text-[10px] uppercase tracking-[.22em] font-bold text-gray-400 dark:text-gray-600">
                    Epilogue
                </span>

                <button onclick="toggleTheme()"
                    aria-label="Toggle theme"
                    class="theme-button w-10 h-10 rounded-xl flex items-center justify-center bg-blue-50 dark:bg-gray-800 text-blue-600 dark:text-rose-400 border border-blue-100 dark:border-gray-700">

                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364-.707-.707M6.343 6.343l-.707-.707m12.728 0-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/>
                    </svg>

                    <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                    </svg>

                </button>

            </div>

        </div>

    </header>

    <!-- MAIN -->

    <main class="max-w-3xl mx-auto px-5 pt-16 sm:pt-24 pb-24">

        <!-- TITLE -->

        <section class="text-center mb-20 sm:mb-24">

            <div class="intro-reveal inline-flex items-center gap-3 mb-9">

                <span class="w-8 h-px bg-blue-400 dark:bg-rose-500"></span>

                <span class="text-[10px] font-extrabold tracking-[.32em] uppercase text-blue-600 dark:text-rose-400">
                    The Final Pages
                </span>

                <span class="w-8 h-px bg-blue-400 dark:bg-rose-500"></span>

            </div>

            <p class="intro-reveal delay-1 text-[10px] sm:text-xs text-gray-400 dark:text-gray-500 tracking-[.28em] uppercase mb-6">
                <?php echo htmlspecialchars($bookTitle); ?>
            </p>

            <h1 class="intro-reveal delay-2 font-serif text-5xl sm:text-6xl md:text-7xl font-medium tracking-tight text-gray-900 dark:text-white leading-[1.15]">
                <?php echo htmlspecialchars($epilogueTitle); ?>
            </h1>

            <p class="intro-reveal delay-3 font-serif italic text-base sm:text-lg text-gray-500 dark:text-gray-400 mt-7">
                Some goodbyes are harder than we imagined.
            </p>

            <div class="intro-reveal delay-4 flex items-center justify-center gap-4 mt-11">

                <div class="h-px w-16 bg-gradient-to-r from-transparent to-blue-300 dark:to-rose-500/40"></div>

                <span class="text-blue-500 dark:text-rose-400 text-sm">✦</span>

                <div class="h-px w-16 bg-gradient-to-l from-transparent to-blue-300 dark:to-rose-500/40"></div>

            </div>

        </section>

        <!-- SCENE ONE -->

        <article class="reveal">

            <div class="scene-marker">

                <span class="scene-dot"></span>

                <span class="text-[10px] uppercase tracking-[.22em] font-extrabold text-gray-400 dark:text-gray-500">
                    A final goodbye
                </span>

            </div>

            <div class="reading-content">

                <p>
                    After sharing one last, lingering kiss, MJ turned and began walking away without looking back. Belle stood still, watching as the distance between them grew wider, each step seemingly carrying him farther away until he finally disappeared around the corner.
                </p>

                <div class="inner-thought reveal">
                    <p class="!mb-0 italic">
                        I guess that's it. I just need to accept that we're going to grow apart and find the strength to live with it.
                    </p>
                </div>

                <p>
                    The thought lingered in Belle's mind as she remained where she was, still hoping that MJ would turn around. But when the realization finally settled in, she took a breath, turned, and began walking in the opposite direction.
                </p>

                <p>
                    Then, suddenly, a familiar warmth.
                </p>

                <div class="dialogue reveal">
                    "I can't, baby. I really can't."
                </div>

                <p>
                    MJ's soft, broken voice came from behind her. Before she could turn around, his arms were already wrapped around her. Her heart began beating louder than it should have, as though it had been waiting for this very moment.
                </p>

                <p>
                    Why couldn't MJ let go? What would happen if they both fought for what they wanted? And was everything they had built together really worth fighting for?
                </p>

                <p class="text-center !mt-12 !mb-0 italic">
                    What did they really have?
                </p>

            </div>

        </article>

        <!-- SCENE DIVIDER -->

        <div class="scene-divider reveal">

            <span class="divider-symbol text-blue-500 dark:text-rose-400 text-sm">
                ✦
            </span>

        </div>

        <!-- SCENE TWO -->

        <article class="reveal">

            <div class="scene-marker">

                <span class="scene-dot"></span>

                <span class="text-[10px] uppercase tracking-[.22em] font-extrabold text-gray-400 dark:text-gray-500">
                    Somewhere in the quiet
                </span>

            </div>

            <div class="reading-content">

                <p>
                    The crickets outside echoed through the room as MJ stared at the blank ceiling.
                </p>

                <div class="inner-thought reveal">
                    <p class="!mb-0 italic">
                        I wish I had never moved to this city. I should have stayed, surrounded by my family and friends.
                    </p>
                </div>

                <p>
                    His lips remained still, but the thoughts he could never bring himself to speak seemed to spill through his teary eyes. Eventually, exhaustion caught up with him, and he surrendered to sleep, unaware of how much his life would change in the days to come.
                </p>

            </div>

        </article>

        <!-- CLOSING -->

        <section class="reveal text-center mt-28 sm:mt-36">

            <div class="h-px w-full bg-gradient-to-r from-transparent via-blue-200 to-transparent dark:via-rose-500/20 mb-16"></div>

            <div class="closing-symbol">
                ✦
            </div>

            <p class="font-serif italic text-2xl sm:text-3xl text-gray-700 dark:text-gray-200 mt-9 leading-relaxed">
                And the story continues...
            </p>

            <p class="text-[10px] uppercase tracking-[.35em] font-extrabold text-gray-400 dark:text-gray-600 mt-7">
                The End
            </p>

            <p class="font-serif italic text-sm text-gray-400 dark:text-gray-500 mt-5">
                Thank you for staying until the very last page.
            </p>

        </section>

        <!-- NAVIGATION -->

        <section class="reveal mt-20">

            <div class="navigation-card bg-white/75 dark:bg-[#14161F]/80 backdrop-blur-xl border border-blue-100 dark:border-gray-800 rounded-3xl p-6 sm:p-9">

                <div class="flex items-center gap-2 mb-5">

                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500 dark:bg-rose-500"></span>

                    <p class="text-[10px] uppercase tracking-[.22em] font-extrabold text-gray-400 dark:text-gray-500">
                        Before you leave
                    </p>

                </div>

                <h2 class="font-serif text-2xl sm:text-3xl font-medium text-gray-900 dark:text-white mb-3">
                    That's everything, for now.
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed mb-8 max-w-lg">
                    You have reached the end of this chapter of their lives. Perhaps there is still more to come.
                </p>

                <a href="content.php"
                    class="back-link flex items-center justify-between w-full p-4 sm:p-5 rounded-2xl bg-blue-50/80 dark:bg-rose-500/[.08] border border-blue-100 dark:border-rose-500/20 hover:bg-blue-100/80 dark:hover:bg-rose-500/[.13]">

                    <span class="text-sm font-bold text-blue-700 dark:text-rose-400">
                        Return to the table of contents
                    </span>

                    <span class="back-arrow text-blue-600 dark:text-rose-400 text-lg">
                        ←
                    </span>

                </a>

            </div>

        </section>

    </main>

    <!-- FOOTER -->

    <footer class="border-t border-blue-500/10 dark:border-rose-500/10 py-10 text-center">

        <p class="font-serif italic text-sm text-gray-400 dark:text-gray-600">
            Written with love, remembered with care.
        </p>

        <p class="mt-4 text-[9px] uppercase tracking-[.25em] font-bold text-gray-400 dark:text-gray-700">
            © <?php echo date('Y'); ?> · <?php echo htmlspecialchars($bookTitle); ?>
        </p>

    </footer>

    <!-- SCRIPTS -->

    <script>
        /* =========================================
           THEME MANAGEMENT
        ========================================= */

        const htmlRoot = document.getElementById('htmlRoot');
        const themeColor = document.getElementById('themeColor');

        function applyTheme(theme) {
            htmlRoot.classList.toggle('dark', theme === 'dark');

            localStorage.setItem('theme', theme);

            themeColor.content = theme === 'dark'
                ? '#0A0B0E'
                : '#FAF8F5';
        }

        const savedTheme = localStorage.getItem('theme');

        const systemDark = window.matchMedia(
            '(prefers-color-scheme: dark)'
        ).matches;

        applyTheme(savedTheme || (systemDark ? 'dark' : 'light'));

        function toggleTheme() {
            const isDark = htmlRoot.classList.contains('dark');

            applyTheme(isDark ? 'light' : 'dark');
        }

        /* =========================================
           READING PROGRESS
        ========================================= */

        const progressBar = document.getElementById('progressBar');

        function updateProgress() {
            const scrollableHeight =
                document.documentElement.scrollHeight - window.innerHeight;

            const progress = scrollableHeight > 0
                ? (window.scrollY / scrollableHeight) * 100
                : 0;

            progressBar.style.width = `${progress}%`;
        }

        window.addEventListener('scroll', updateProgress, {
            passive: true
        });

        window.addEventListener('resize', updateProgress);

        updateProgress();

        /* =========================================
           SCROLL REVEAL
        ========================================= */

        const revealElements = document.querySelectorAll('.reveal');

        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -35px 0px'
        });

        revealElements.forEach(element => {
            revealObserver.observe(element);
        });

        /* =========================================
           FLOATING PARTICLES
        ========================================= */

        const particleContainer = document.getElementById('particles');

        const particleCount = window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches ? 0 : 18;

        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('span');

            particle.className = 'particle';

            particle.style.left = `${Math.random() * 100}%`;
            particle.style.bottom = `${Math.random() * 100}%`;
            particle.style.animationDuration = `${12 + Math.random() * 15}s`;
            particle.style.animationDelay = `${Math.random() * 10}s`;
            particle.style.width = `${2 + Math.random() * 2}px`;
            particle.style.height = particle.style.width;

            particleContainer.appendChild(particle);
        }
    </script>

</body>
</html>
