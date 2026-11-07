<?php
    $bookTitle = "Gone too close too fast";
    $safeBookTitle = htmlspecialchars($bookTitle, ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="en" id="htmlRoot">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#FAF8F5" id="themeColor">

    <title>Reading - <?php echo $safeBookTitle; ?></title>

    <!-- Prevent theme flashing -->
    <script>
        (() => {
            try {
                const savedTheme = localStorage.getItem('theme');
                const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                if (savedTheme === 'dark' || (!savedTheme && systemDark)) {
                    document.documentElement.classList.add('dark');
                }
            } catch (error) {}
        })();
    </script>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['Lora', 'serif']
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
            scroll-padding-top: 90px;
        }

        body {
            overflow-x: hidden;
            min-height: 100vh;
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

        .particles {
            position: fixed;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
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
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .intro-reveal {
            opacity: 0;
            animation: fadeUp .85s cubic-bezier(.2, .8, .2, 1) forwards;
        }

        .delay-1 { animation-delay: 120ms; }
        .delay-2 { animation-delay: 240ms; }
        .delay-3 { animation-delay: 360ms; }

        .reveal {
            opacity: 0;
            transform: translateY(22px);
            transition:
                opacity .7s ease,
                transform .7s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* =========================================
           HEADER
        ========================================= */

        .glass-header {
            background: rgba(250, 248, 245, .80);
            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);
            border-bottom: 1px solid rgba(37, 99, 235, .09);
        }

        .dark .glass-header {
            background: rgba(10, 11, 14, .80);
            border-bottom-color: rgba(244, 63, 117, .12);
        }

        .theme-button {
            transition: transform .3s ease;
        }

        .theme-button:hover {
            transform: rotate(12deg) scale(1.08);
        }

        /* =========================================
           READING CONTENT
        ========================================= */

        .reading-content {
            font-family: 'Lora', serif;
            font-size: 17px;
            line-height: 2.05;
            letter-spacing: .005em;
            color: #52525B;
        }

        .dark .reading-content {
            color: #A1A1AA;
        }

        .chapter-paragraph {
            margin: 0 0 1.9rem;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        /* =========================================
           DIALOGUE
        ========================================= */

        .dialogue {
            font-family: 'Lora', serif;
            font-size: clamp(1.15rem, 3vw, 1.4rem);
            font-style: italic;
            line-height: 1.9;
            color: #2563EB;
            text-align: center;
            padding: 22px 18px;
            margin: 2rem 0;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .dark .dialogue {
            color: #FB7185;
        }

        /* =========================================
           INTERNAL THOUGHTS
           Matches the epilogue design
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

        .inner-thought p {
            margin: 0;
            font-style: italic;
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

        /* Inline thought markers, if used inside narration */

        .inline-thought {
            color: #2563EB;
            font-style: italic;
        }

        .dark .inline-thought {
            color: #FB7185;
        }

        /* =========================================
           SCENE HEADINGS
        ========================================= */

        .scene-heading {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 3.5rem 0 2rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .22em;
            text-transform: uppercase;
            color: #9CA3AF;
        }

        .scene-heading::before {
            content: "";
            width: 8px;
            height: 8px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #2563EB;
            box-shadow: 0 0 0 5px rgba(37, 99, 235, .09);
        }

        .dark .scene-heading::before {
            background: #F43F75;
            box-shadow: 0 0 0 5px rgba(244, 63, 117, .1);
        }

        /* =========================================
           CHAPTER NAVIGATION
        ========================================= */

        .chapter-nav {
            transition:
                transform .3s ease,
                border-color .3s ease,
                background .3s ease;
        }

        .chapter-nav:hover {
            transform: translateY(-3px);
            border-color: rgba(37, 99, 235, .35);
        }

        .dark .chapter-nav:hover {
            border-color: rgba(244, 63, 117, .35);
        }

        .nav-arrow {
            transition: transform .3s ease;
        }

        .chapter-nav:hover .nav-arrow.next {
            transform: translateX(4px);
        }

        .chapter-nav:hover .nav-arrow.previous {
            transform: translateX(-4px);
        }

        .chapter-nav.disabled {
            opacity: .4;
            pointer-events: none;
            cursor: default;
        }

        /* =========================================
           READING PROGRESS
        ========================================= */

        #progressBar {
            width: 0;
            transition: width .12s linear;
        }

        /* =========================================
           ERROR STATE
        ========================================= */

        .error-panel {
            border: 1px solid rgba(239, 68, 68, .2);
            background: rgba(239, 68, 68, .04);
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 640px) {
            .reading-content {
                font-size: 16px;
                line-height: 2;
            }

            .chapter-paragraph {
                margin-bottom: 1.6rem;
            }

            .inner-thought {
                padding: 20px;
            }

            .ambient {
                width: 280px;
                height: 280px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
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

    <!-- BACKGROUND -->

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
        <div class="max-w-5xl mx-auto px-5 h-[68px] flex items-center justify-between">

            <a href="/content"
                class="group flex items-center gap-3 text-sm font-semibold text-blue-600 dark:text-rose-400">

                <span class="w-9 h-9 rounded-xl flex items-center justify-center bg-blue-50 dark:bg-rose-500/10 border border-blue-100 dark:border-rose-500/20 transition-transform group-hover:-translate-x-1">
                    ←
                </span>

                <span>Contents</span>
            </a>

            <div class="flex items-center gap-3">

                <span id="chapterIndicator"
                    class="hidden sm:block text-[10px] uppercase tracking-[.2em] font-bold text-gray-400 dark:text-gray-600">
                    Reading
                </span>

                <button type="button"
                    onclick="toggleTheme()"
                    aria-label="Toggle theme"
                    class="theme-button w-10 h-10 rounded-xl flex items-center justify-center bg-blue-50 dark:bg-gray-800 text-blue-600 dark:text-rose-400 border border-blue-100 dark:border-gray-700">

                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364-.707-.707M6.343 6.343l-.707-.707m12.728 0-.707.707M6.343 17.657l.707.707M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/>
                    </svg>

                    <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                    </svg>

                </button>
            </div>
        </div>
    </header>

    <!-- MAIN -->

    <main class="max-w-3xl mx-auto px-5 pt-14 sm:pt-20 pb-24">

        <!-- CHAPTER HEADER -->

        <section class="text-center mb-16 sm:mb-20">

            <div class="intro-reveal inline-flex items-center gap-3 mb-8">
                <span class="w-8 h-px bg-blue-400 dark:bg-rose-500"></span>

                <span class="text-[10px] font-extrabold tracking-[.3em] uppercase text-blue-600 dark:text-rose-400">
                    Now Reading
                </span>

                <span class="w-8 h-px bg-blue-400 dark:bg-rose-500"></span>
            </div>

            <p class="intro-reveal delay-1 text-[10px] sm:text-xs text-gray-400 dark:text-gray-500 tracking-[.25em] uppercase mb-5">
                <?php echo $safeBookTitle; ?>
            </p>

            <p id="chapterNumber"
                class="intro-reveal delay-1 text-[10px] font-bold uppercase tracking-[.25em] text-gray-400 dark:text-gray-600 mb-4">
                Loading chapter...
            </p>

            <h1 id="chapterTitle"
                class="intro-reveal delay-2 font-serif text-4xl sm:text-5xl md:text-6xl font-medium tracking-tight text-gray-900 dark:text-white leading-tight">
                Please wait
            </h1>

            <div class="intro-reveal delay-3 flex items-center justify-center gap-4 mt-9">
                <div class="h-px w-16 bg-gradient-to-r from-transparent to-blue-300 dark:to-rose-500/40"></div>

                <span class="text-blue-500 dark:text-rose-400 text-sm">✦</span>

                <div class="h-px w-16 bg-gradient-to-l from-transparent to-blue-300 dark:to-rose-500/40"></div>
            </div>

        </section>

        <!-- CHAPTER CONTENT -->

        <article id="chapterContent" class="reading-content min-h-[300px]">

            <div class="text-center py-16 text-gray-400">
                Loading your chapter...
            </div>

        </article>

        <!-- END OF CHAPTER -->

        <section id="chapterEnding" class="hidden text-center mt-20 mb-16">

            <div class="h-px w-full bg-gradient-to-r from-transparent via-blue-200 to-transparent dark:via-rose-500/20 mb-12"></div>

            <span class="text-blue-500 dark:text-rose-400 text-2xl">✦</span>

            <p class="font-serif italic text-xl sm:text-2xl text-gray-700 dark:text-gray-300 mt-5">
                End of chapter.
            </p>

            <p class="text-[10px] uppercase tracking-[.25em] font-bold text-gray-400 dark:text-gray-600 mt-4">
                Keep turning the pages
            </p>

        </section>

        <!-- CHAPTER NAVIGATION -->

        <section id="chapterNavigation" class="hidden mt-12">

            <div class="grid grid-cols-2 gap-3 sm:gap-5">

                <a id="previousChapter"
                    href="/content"
                    class="chapter-nav min-w-0 bg-white/75 dark:bg-[#14161F]/80 backdrop-blur-xl border border-blue-100 dark:border-gray-800 rounded-2xl p-4 sm:p-5">

                    <span class="flex items-center gap-2 text-[9px] sm:text-[10px] uppercase tracking-[.15em] font-extrabold text-gray-400 dark:text-gray-500 mb-3">
                        <span class="nav-arrow previous">←</span>
                        Previous
                    </span>

                    <span id="previousTitle"
                        class="block font-serif text-sm sm:text-base text-gray-800 dark:text-gray-200 truncate">
                        Previous chapter
                    </span>

                </a>

                <a id="nextChapter"
                    href="/epilogue"
                    class="chapter-nav min-w-0 text-right bg-white/75 dark:bg-[#14161F]/80 backdrop-blur-xl border border-blue-100 dark:border-gray-800 rounded-2xl p-4 sm:p-5">

                    <span class="flex items-center justify-end gap-2 text-[9px] sm:text-[10px] uppercase tracking-[.15em] font-extrabold text-gray-400 dark:text-gray-500 mb-3">
                        Next
                        <span class="nav-arrow next">→</span>
                    </span>

                    <span id="nextTitle"
                        class="block font-serif text-sm sm:text-base text-gray-800 dark:text-gray-200 truncate">
                        Next chapter
                    </span>

                </a>

            </div>

            <a href="/content"
                class="block text-center mt-7 text-xs font-semibold text-blue-600 dark:text-rose-400 hover:opacity-70 transition-opacity">
                Return to all chapters
            </a>

        </section>

        <!-- ERROR MESSAGE -->

        <section id="errorMessage" class="hidden error-panel rounded-2xl p-6 text-center mt-12">

            <p class="font-semibold text-red-600 dark:text-red-400 mb-2">
                Unable to load this chapter.
            </p>

            <p id="errorDetails" class="text-sm text-gray-500 dark:text-gray-400 mb-5">
                Something went wrong.
            </p>

            <a href="/content"
                class="inline-flex items-center justify-center px-5 py-3 rounded-xl bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700 transition-colors">
                Back to contents
            </a>

        </section>

    </main>

    <!-- FOOTER -->

    <footer class="border-t border-blue-500/10 dark:border-rose-500/10 py-9 text-center">

        <p class="font-serif italic text-sm text-gray-400 dark:text-gray-600">
            Take your time. Some pages deserve to be read twice.
        </p>

        <p class="mt-4 text-[9px] uppercase tracking-[.25em] font-bold text-gray-400 dark:text-gray-700">
            © <?php echo date('Y'); ?> · <?php echo $safeBookTitle; ?>
        </p>

    </footer>

    <!-- DATABASE -->

    <script src="/database.js"></script>

    <script>
        /* =========================================
           THEME MANAGEMENT
        ========================================= */

        const htmlRoot = document.getElementById('htmlRoot');
        const themeColor = document.getElementById('themeColor');

        function applyTheme(theme) {
            htmlRoot.classList.toggle('dark', theme === 'dark');

            try {
                localStorage.setItem('theme', theme);
            } catch (error) {}

            themeColor.content = theme === 'dark'
                ? '#0A0B0E'
                : '#FAF8F5';
        }

        function toggleTheme() {
            const isDark = htmlRoot.classList.contains('dark');
            applyTheme(isDark ? 'light' : 'dark');
        }

        const savedTheme = (() => {
            try {
                return localStorage.getItem('theme');
            } catch (error) {
                return null;
            }
        })();

        const systemDark = window.matchMedia(
            '(prefers-color-scheme: dark)'
        ).matches;

        applyTheme(savedTheme || (systemDark ? 'dark' : 'light'));


        /* =========================================
           ELEMENT REFERENCES
        ========================================= */

        const chapterTitle = document.getElementById('chapterTitle');
        const chapterNumber = document.getElementById('chapterNumber');
        const chapterIndicator = document.getElementById('chapterIndicator');
        const chapterContent = document.getElementById('chapterContent');

        const chapterEnding = document.getElementById('chapterEnding');
        const chapterNavigation = document.getElementById('chapterNavigation');

        const errorMessage = document.getElementById('errorMessage');
        const errorDetails = document.getElementById('errorDetails');

        const progressBar = document.getElementById('progressBar');


        /* =========================================
           URL PARAMETERS
        ========================================= */

        const urlParams = new URLSearchParams(window.location.search);
        const requestedChapterId = urlParams.get('id');


        /* =========================================
           DATABASE VALIDATION
        ========================================= */

        function getNovelDatabase() {
            if (typeof novelData !== 'undefined' && novelData !== null) {
                return novelData;
            }

            return null;
        }

        function validateChapters(database) {
            if (!database || !Array.isArray(database.chapters)) {
                return {
                    valid: false,
                    message: 'The database.js file must define novelData with a chapters array.'
                };
            }

            if (database.chapters.length === 0) {
                return {
                    valid: false,
                    message: 'No chapters were found in your database.js file.'
                };
            }

            return {
                valid: true,
                chapters: database.chapters
            };
        }


        /* =========================================
           DIALOGUE DETECTION
        ========================================= */

        function isDialogue(text) {
            const value = text.trim();

            if (value.length < 2) return false;

            const opening = value[0];
            const closing = value[value.length - 1];

            const matchingQuotes = {
                '"': '"',
                "'": "'",
                '“': '”',
                '‘': '’'
            };

            return matchingQuotes[opening] === closing;
        }


        /* =========================================
           INTERNAL THOUGHT DETECTION
        ========================================= */

        function isThought(text) {
            const value = text.trim();

            return (
                value.startsWith('**') &&
                value.endsWith('**') &&
                value.length > 4
            );
        }


        /* =========================================
           SCENE HEADING DETECTION
        ========================================= */

        function isSceneHeading(text) {
            const value = text.trim();

            // Avoid treating every uppercase paragraph as a scene heading.
            // Scene headings should contain an identifiable scene separator
            // or a POV label, for example:
            // BELLE'S POV · MORNING
            // MJ'S POV | EVENING

            const hasSceneMarker =
                /\bPOV\b/i.test(value) ||
                /[·|—–]/.test(value);

            const isUppercase = value === value.toLocaleUpperCase();

            return (
                value.length <= 90 &&
                value.length >= 3 &&
                isUppercase &&
                hasSceneMarker
            );
        }


        /* =========================================
           INLINE THOUGHT FORMATTING
        ========================================= */

        function appendInlineThoughts(element, text) {
            const parts = text.split(/(\*\*[\s\S]+?\*\*)/g);

            parts.forEach(part => {
                if (
                    part.startsWith('**') &&
                    part.endsWith('**') &&
                    part.length > 4
                ) {
                    const thought = document.createElement('em');

                    thought.className = 'inline-thought';
                    thought.textContent = part.slice(2, -2).trim();

                    element.appendChild(thought);
                } else {
                    element.appendChild(
                        document.createTextNode(part)
                    );
                }
            });
        }


        /* =========================================
           PARAGRAPH CREATION
        ========================================= */

        function createParagraph(text) {
            const paragraph = document.createElement('p');

            paragraph.className = 'chapter-paragraph reveal';

            appendInlineThoughts(paragraph, text);

            return paragraph;
        }


        /* =========================================
           CHAPTER CONTENT RENDERER
        ========================================= */

        function renderChapterContent(content) {
            chapterContent.replaceChildren();

            const normalizedContent = content
                .replace(/\r\n?/g, '\n')
                .trim();

            if (!normalizedContent) {
                const emptyMessage = document.createElement('p');

                emptyMessage.className = 'text-center text-gray-400 py-16';
                emptyMessage.textContent = 'This chapter does not have any content yet.';

                chapterContent.appendChild(emptyMessage);
                return;
            }

            // Each block separated by a blank line is treated as
            // an individual paragraph, dialogue, thought, or scene heading.
            const blocks = normalizedContent.split(/\n[ \t]*\n+/);

            blocks.forEach(block => {
                const text = block.trim();

                if (!text) return;

                let element;

                // 1. SCENE HEADING
                if (isSceneHeading(text)) {
                    element = document.createElement('div');

                    element.className = 'scene-heading reveal';
                    element.textContent = text;
                }

                // 2. COMPLETE INTERNAL THOUGHT
                else if (isThought(text)) {
                    const thoughtText = document.createElement('p');

                    element = document.createElement('div');
                    element.className = 'inner-thought reveal';

                    // Same structure as the epilogue.
                    thoughtText.className = 'italic';
                    thoughtText.textContent = text.slice(2, -2).trim();

                    element.appendChild(thoughtText);
                }

                // 3. DIALOGUE
                else if (isDialogue(text)) {
                    element = document.createElement('div');

                    element.className = 'dialogue reveal';
                    element.textContent = text;
                }

                // 4. NORMAL NARRATION
                else {
                    element = createParagraph(text);
                }

                chapterContent.appendChild(element);
            });

            observeRevealElements();
        }


        /* =========================================
           ERROR HANDLING
        ========================================= */

        function showError(message) {
            chapterContent.replaceChildren();
            chapterContent.classList.add('hidden');

            chapterEnding.classList.add('hidden');
            chapterNavigation.classList.add('hidden');

            chapterTitle.textContent = 'Chapter unavailable';

            chapterNumber.textContent = '';
            chapterIndicator.textContent = 'Unable to load';

            errorDetails.textContent = message;
            errorMessage.classList.remove('hidden');

            progressBar.style.width = '0%';

            console.error(message);
        }


        /* =========================================
           PREVIOUS / NEXT NAVIGATION
        ========================================= */

        function setupChapterNavigation(chapters, currentIndex) {
            const previousLink = document.getElementById('previousChapter');
            const nextLink = document.getElementById('nextChapter');

            const previousTitle = document.getElementById('previousTitle');
            const nextTitle = document.getElementById('nextTitle');

            const previousChapter = chapters[currentIndex - 1];
            const nextChapter = chapters[currentIndex + 1];

            // PREVIOUS CHAPTER

            if (previousChapter) {
                previousLink.href =
                    `/reading?id=${encodeURIComponent(previousChapter.id)}`;

                previousTitle.textContent =
                    previousChapter.title || 'Previous chapter';

                previousLink.classList.remove('disabled');
                previousLink.setAttribute('aria-label', `Previous chapter: ${previousChapter.title || ''}`);
            } else {
                previousLink.href = '/content';
                previousTitle.textContent = 'Back to contents';

                previousLink.classList.add('disabled');
                previousLink.setAttribute('aria-label', 'No previous chapter');
            }

            // NEXT CHAPTER

            if (nextChapter) {
                nextLink.href =
                    `/reading?id=${encodeURIComponent(nextChapter.id)}`;

                nextTitle.textContent =
                    nextChapter.title || 'Next chapter';

                nextLink.classList.remove('disabled');
                nextLink.setAttribute('aria-label', `Next chapter: ${nextChapter.title || ''}`);
            } else {
                nextLink.href = '/epilogue';
                nextTitle.textContent = 'Read the epilogue';

                nextLink.classList.remove('disabled');
                nextLink.setAttribute('aria-label', 'Read the epilogue');
            }
        }


        /* =========================================
           LOAD CHAPTER
        ========================================= */

        function loadChapter() {
            const database = getNovelDatabase();
            const validation = validateChapters(database);

            if (!validation.valid) {
                showError(validation.message);
                return;
            }

            if (requestedChapterId === null || requestedChapterId.trim() === '') {
                showError(
                    'No chapter ID was provided. Please select a chapter from the table of contents.'
                );

                return;
            }

            const chapters = validation.chapters;

            // Check for valid chapter records.
            const currentIndex = chapters.findIndex(chapter =>
                chapter &&
                chapter.id !== undefined &&
                chapter.id !== null &&
                String(chapter.id) === String(requestedChapterId)
            );

            if (currentIndex === -1) {
                showError(
                    `Chapter ID "${requestedChapterId}" could not be found in database.js.`
                );

                return;
            }

            const chapter = chapters[currentIndex];

            if (typeof chapter.content !== 'string') {
                showError(
                    'The selected chapter does not have a valid content string.'
                );

                return;
            }

            // Update chapter information.
            const title = chapter.title || `Chapter ${currentIndex + 1}`;

            chapterTitle.textContent = title;

            chapterNumber.textContent =
                `Chapter ${currentIndex + 1} of ${chapters.length}`;

            chapterIndicator.textContent =
                `Chapter ${currentIndex + 1}`;

            document.title = `${title} - <?php echo addslashes($bookTitle); ?>`;

            // Render chapter content.
            renderChapterContent(chapter.content);

            // Display chapter ending and navigation.
            errorMessage.classList.add('hidden');
            chapterContent.classList.remove('hidden');

            chapterEnding.classList.remove('hidden');
            chapterNavigation.classList.remove('hidden');

            // Configure neighboring chapters.
            setupChapterNavigation(chapters, currentIndex);

            // Update page state.
            observeRevealElements();
            updateProgress();

            console.log('Successfully loaded chapter:', title);
            console.log('Chapter ID:', chapter.id);
            console.log('Chapter position:', `${currentIndex + 1}/${chapters.length}`);
        }


        /* =========================================
           SCROLL REVEAL
        ========================================= */

        function observeRevealElements() {
            const elements = document.querySelectorAll(
                '#chapterContent .reveal'
            );

            const reduceMotion = window.matchMedia(
                '(prefers-reduced-motion: reduce)'
            ).matches;

            if (
                reduceMotion ||
                !('IntersectionObserver' in window)
            ) {
                elements.forEach(element => {
                    element.classList.add('visible');
                });

                return;
            }

            const observer = new IntersectionObserver((entries, currentObserver) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        currentObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.08,
                rootMargin: '0px 0px -30px 0px'
            });

            elements.forEach(element => {
                if (!element.classList.contains('visible')) {
                    observer.observe(element);
                }
            });
        }


        /* =========================================
           READING PROGRESS
        ========================================= */

        let progressTicking = false;

        function updateProgress() {
            if (progressTicking) return;

            progressTicking = true;

            requestAnimationFrame(() => {
                const documentHeight =
                    document.documentElement.scrollHeight;

                const scrollableHeight =
                    documentHeight - window.innerHeight;

                const progress = scrollableHeight > 0
                    ? (window.scrollY / scrollableHeight) * 100
                    : 0;

                progressBar.style.width =
                    `${Math.min(100, Math.max(0, progress))}%`;

                progressTicking = false;
            });
        }

        window.addEventListener('scroll', updateProgress, {
            passive: true
        });

        window.addEventListener('resize', updateProgress);


        /* =========================================
           FLOATING PARTICLES
        ========================================= */

        const particleContainer = document.getElementById('particles');

        const reducedMotion = window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;

        if (!reducedMotion) {
            for (let i = 0; i < 18; i++) {
                const particle = document.createElement('span');

                particle.className = 'particle';

                particle.style.left = `${Math.random() * 100}%`;
                particle.style.bottom = `${Math.random() * 100}%`;

                particle.style.animationDuration =
                    `${12 + Math.random() * 15}s`;

                particle.style.animationDelay =
                    `${Math.random() * 10}s`;

                const size = `${2 + Math.random() * 2}px`;

                particle.style.width = size;
                particle.style.height = size;

                particleContainer.appendChild(particle);
            }
        }


        /* =========================================
           INITIALIZE
        ========================================= */

        loadChapter();

        window.addEventListener('load', updateProgress);

    </script>

</body>
</html>
