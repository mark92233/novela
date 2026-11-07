<?php
$bookTitle = "Gone too close too fast";
$subtitle = "When Being Together Became Harder Than Falling Together";

$synopsis = "There is a peculiar vulnerability in becoming familiar with someone before having the time to fully understand them. We mistake proximity for familiarity, constant presence for permanence, and the intensity of an emotion for the certainty of knowing another person. Perhaps that is what makes our story rather unusual; what would ordinarily take months of gradual discovery seemed to unfold within days, from our first date to practically sharing a life together. The beginning was filled with the warmth of newfound affection, the comfort of constant companionship, and the kind of excitement that made everything feel effortless, although even those seemingly perfect days had their colder nights. But as the weeks passed and the initial euphoria gradually settled, reality began finding its way into the spaces we had so quickly built together. Family circumstances, personal struggles, and conflicts began revealing the complexities that affection alone could not immediately resolve. We were no longer simply discovering the beautiful parts of each other; we were also confronting the expectations, responsibilities, and consequences that came with allowing another person so deeply into our lives. Perhaps the real challenge was never learning how to be together, but learning how to understand each other when being together became difficult. And as our story continues to unfold, I find myself realizing that intimacy is not merely about how quickly two people can become close, but how willing they are to understand one another when the novelty fades and reality begins.";

$coverImage = "/Gone Too Close, Too Fast.png";

// Existing access logic
$correctPin = "092026";

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredPin = implode('', $_POST['pin'] ?? []);

    if ($enteredPin === $correctPin) {
        header("Location: /content");
        exit;
    } else {
        $error = "Incorrect PIN. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en" id="htmlRoot" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="#FAF8F5">
    <meta name="description" content="<?php echo htmlspecialchars($synopsis, ENT_QUOTES, 'UTF-8'); ?>">

    <title><?php echo htmlspecialchars($bookTitle, ENT_QUOTES, 'UTF-8'); ?></title>

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
            scroll-padding-top: 90px;
        }

        body {
            background: var(--bg);
            color: var(--text);
            transition: background .5s ease, color .5s ease;
            overflow-x: hidden;
        }

        /* ---------------------------------
           AMBIENT BACKGROUND
        --------------------------------- */

        .ambient-background {
            position: fixed;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: -2;
            isolation: isolate;
        }

        .ambient-background::after {
            content: "";
            position: absolute;
            inset: 0;
            opacity: .28;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.16'/%3E%3C/svg%3E");
            mix-blend-mode: multiply;
        }

        .dark .ambient-background::after {
            mix-blend-mode: screen;
            opacity: .12;
        }

        .ambient-orb {
            position: absolute;
            width: 450px;
            height: 450px;
            border-radius: 50%;
            filter: blur(100px);
            opacity: .19;
            background: #3B82F6;
            animation: drift 18s ease-in-out infinite alternate;
            will-change: transform;
        }

        .dark .ambient-orb {
            background: #E11D65;
            opacity: .16;
        }

        .orb-one {
            top: -180px;
            left: -120px;
        }

        .orb-two {
            top: 20%;
            right: -200px;
            width: 520px;
            height: 520px;
            animation-delay: -6s;
            animation-duration: 22s;
        }

        .orb-three {
            bottom: -250px;
            left: 25%;
            width: 500px;
            height: 500px;
            animation-delay: -11s;
            animation-duration: 25s;
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
                transform: translate3d(0, 0, 0) scale(1);
            }
            50% {
                transform: translate3d(70px, 60px, 0) scale(1.12);
            }
            100% {
                transform: translate3d(-40px, 100px, 0) scale(.92);
            }
        }

        /* ---------------------------------
           FLOATING PARTICLES
        --------------------------------- */

        .particle {
            position: absolute;
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: var(--accent);
            opacity: .35;
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

        /* ---------------------------------
           HEADER
        --------------------------------- */

        .site-header {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .header-link {
            position: relative;
            transition: color .25s ease;
        }

        .header-link::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width .3s ease;
        }

        .header-link:hover::after {
            width: 100%;
        }

        /* ---------------------------------
           HERO
        --------------------------------- */

        .hero-section {
            min-height: 680px;
        }

        .hero-content {
            animation: heroEnter .9s cubic-bezier(.2, .8, .2, 1) both;
        }

        .hero-cover {
            animation: coverEnter 1.1s cubic-bezier(.2, .8, .2, 1) both,
                       coverFloat 7s ease-in-out 1.1s infinite;
            transform-style: preserve-3d;
        }

        .cover-glow {
            position: absolute;
            inset: -20px;
            border-radius: 28px;
            background: linear-gradient(135deg, #3B82F6, #93C5FD, #6366F1);
            filter: blur(35px);
            opacity: .35;
            animation: glowPulse 5s ease-in-out infinite;
            transition: background  .5s ease;
        }

        .dark .cover-glow {
            background: linear-gradient(135deg, #E11D65, #FB7185, #BE185D);
        }

        @keyframes heroEnter {
            from {
                opacity: 0;
                transform: translateY(35px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes coverEnter {
            from {
                opacity: 0;
                transform: translateY(45px) rotate(-5deg) scale(.92);
            }
            to {
                opacity: 1;
                transform: translateY(0) rotate(0) scale(1);
            }
        }

        @keyframes coverFloat {
            0%, 100% {
                transform: translateY(0) rotate(0);
            }
            50% {
                transform: translateY(-12px) rotate(1deg);
            }
        }

        @keyframes glowPulse {
            0%, 100% {
                opacity: .25;
                transform: scale(.96);
            }
            50% {
                opacity: .5;
                transform: scale(1.05);
            }
        }

        .hero-kicker {
            animation: heroEnter .7s .15s both;
        }

        .hero-title {
            animation: heroEnter .8s .3s both;
        }

        .hero-subtitle {
            animation: heroEnter .8s .45s both;
        }

        .hero-actions {
            animation: heroEnter .8s .6s both;
        }

        .accent-text {
            color: var(--accent);
        }

        /* ---------------------------------
           BUTTONS
        --------------------------------- */

        .primary-button {
            position: relative;
            overflow: hidden;
            isolation: isolate;
            background: var(--accent);
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .primary-button::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(110deg, transparent 25%, rgba(255,255,255,.24) 50%, transparent 75%);
            transform: translateX(-120%);
            transition: transform .7s ease;
            z-index: -1;
        }

        .primary-button:hover::before {
            transform: translateX(120%);
        }

        .primary-button:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px var(--accent-soft);
        }

        .secondary-button {
            border: 1px solid var(--border);
            background: var(--surface);
            transition: transform .3s ease, border-color .3s ease, background .3s ease;
        }

        .secondary-button:hover {
            transform: translateY(-4px);
            border-color: var(--accent);
        }

        /* ---------------------------------
           SYNOPSIS
        --------------------------------- */

        .synopsis-card {
            position: relative;
            background: var(--surface);
            border: 1px solid var(--border);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 25px 80px rgba(0, 0, 0, .035);
            transition: border-color .4s ease, transform .4s ease;
        }

        .synopsis-card:hover {
            border-color: var(--accent);
            transform: translateY(-4px);
        }

        .synopsis-quote {
            font-family: 'Lora', serif;
            font-size: clamp(1rem, 1.6vw, 1.15rem);
            line-height: 2;
            color: var(--muted);
        }

        .synopsis-card::before {
            content: "“";
            position: absolute;
            top: -40px;
            right: 30px;
            font-family: 'Lora', serif;
            font-size: 150px;
            line-height: 1;
            color: var(--accent);
            opacity: .09;
            pointer-events: none;
        }

        /* ---------------------------------
           SCROLL REVEAL
        --------------------------------- */

        .reveal {
            opacity: 0;
            transform: translateY(35px);
            transition: opacity .8s ease, transform .8s cubic-bezier(.2, .8, .2, 1);
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ---------------------------------
           MODAL
        --------------------------------- */

        #pinModal {
            visibility: hidden;
            opacity: 0;
            pointer-events: none;
            transition: opacity .3s ease, visibility .3s ease;
        }

        #pinModal.active {
            visibility: visible;
            opacity: 1;
            pointer-events: auto;
        }

        #modalContent {
            opacity: 0;
            transform: translateY(25px) scale(.96);
            transition: opacity .35s ease, transform .4s cubic-bezier(.2, .8, .2, 1);
        }

        #pinModal.active #modalContent {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .pin-input {
            transition: border-color .2s ease, background .2s ease, transform .2s ease, box-shadow .2s ease;
        }

        .pin-input:focus {
            transform: translateY(-3px);
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }

        .shake {
            animation: shake .4s ease;
        }

        /* ---------------------------------
           FOOTER
        --------------------------------- */

        .footer-line {
            width: 45px;
            height: 2px;
            background: var(--accent);
            margin: 0 auto 15px;
            opacity: .6;
        }

        /* ---------------------------------
           ACCESSIBILITY
        --------------------------------- */

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }

            .reveal {
                opacity: 1;
                transform: none;
            }
        }

        @media (max-width: 640px) {
            .hero-section {
                min-height: auto;
            }

            .ambient-orb {
                width: 300px;
                height: 300px;
                filter: blur(75px);
            }

            .synopsis-card::before {
                font-size: 100px;
                top: -20px;
            }
        }
    </style>
</head>

<body class="min-h-screen flex flex-col antialiased selection:bg-blue-500 selection:text-white dark:selection:bg-rose-500">

    <!-- AMBIENT BACKGROUND -->
    <div class="ambient-background" aria-hidden="true">
        <div class="ambient-orb orb-one"></div>
        <div class="ambient-orb orb-two"></div>
        <div class="ambient-orb orb-three"></div>
        <div class="ambient-grid"></div>
        <div id="particles"></div>
    </div>

    <!-- HEADER -->
    <header class="site-header sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-5 sm:px-8 h-[68px] flex items-center justify-between">

            <a href="/index" class="flex items-center gap-3 group">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center text-white font-serif font-bold text-lg shadow-lg"
                     style="background:var(--accent)">
                    G.
                </div>

                <div class="flex flex-col">
                    <span class="font-serif text-sm font-bold tracking-tight">
                        <?php echo htmlspecialchars($bookTitle, ENT_QUOTES, 'UTF-8'); ?>
                    </span>
                    <span class="text-[9px] uppercase tracking-[.2em] opacity-50">
                        A Private Chronicle
                    </span>
                </div>
            </a>

            <div class="flex items-center gap-3 sm:gap-5">

                <a href="#synopsis-section"
                   class="header-link hidden sm:inline-block text-xs font-semibold opacity-60 hover:opacity-100">
                    About the story
                </a>

                <button onclick="toggleTheme()"
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
    </header>


    <!-- MAIN CONTENT -->
    <main class="flex-grow">

        <!-- HERO -->
        <section class="hero-section max-w-7xl mx-auto px-5 sm:px-8 py-16 sm:py-24 flex flex-col items-center justify-center text-center">

            <!-- Book cover -->
            <div class="hero-content relative mb-12">
                <div class="cover-glow"></div>

                <div class="hero-cover relative w-48 sm:w-60 aspect-[3/4] rounded-2xl overflow-hidden shadow-2xl border border-white/50 dark:border-white/10 group">
                    <img
                        src="<?php echo htmlspecialchars($coverImage, ENT_QUOTES, 'UTF-8'); ?>"
                        alt="Cover artwork for Gone too close too fast"
                        class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110"
                        loading="eager"
                    >

                    <div class="absolute inset-0 bg-gradient-to-t from-black/35 via-transparent to-white/10"></div>

                    <div class="absolute bottom-4 left-0 right-0 text-center text-white">
                        <span class="text-[9px] uppercase tracking-[.3em] font-semibold opacity-90">
                            Base on true events
                        </span>
                    </div>
                </div>

                <!-- Floating decorative elements -->
                <div class="absolute -top-5 -right-8 sm:-right-12 w-12 h-12 rounded-2xl border flex items-center justify-center backdrop-blur-md animate-bounce"
                     style="background:var(--surface);border-color:var(--border);color:var(--accent);animation-duration:4s">
                    <span class="text-xl">♡</span>
                </div>

                <div class="absolute -bottom-5 -left-8 sm:-left-12 w-10 h-10 rounded-full border flex items-center justify-center backdrop-blur-md"
                     style="background:var(--surface);border-color:var(--border);color:var(--accent);animation:coverFloat 5s ease-in-out infinite">
                    <span class="text-sm">♡</span>
                </div>
            </div>


            <!-- Title and description -->
            <div class="max-w-3xl mx-auto">

                <div class="hero-kicker inline-flex items-center gap-2 px-4 py-2 rounded-full border text-[10px] sm:text-xs font-bold uppercase tracking-[.2em] mb-6"
                     style="background:var(--accent-soft);border-color:var(--border);color:var(--accent)">
                    <span class="w-1.5 h-1.5 rounded-full animate-pulse" style="background:var(--accent)"></span>
                    A Private Chronicle
                </div>

                <h1 class="hero-title font-serif text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight leading-[1.12] mb-6">
                    Gone too close<br>
                    <span class="italic accent-text">too fast.</span>
                </h1>

                <p class="hero-subtitle font-serif italic text-base sm:text-xl opacity-60 max-w-xl mx-auto leading-relaxed">
                    <?php echo htmlspecialchars($subtitle, ENT_QUOTES, 'UTF-8'); ?>
                </p>

                <div class="hero-actions flex flex-col sm:flex-row items-center justify-center gap-3 mt-10">

                    <button onclick="openModal()"
                            class="primary-button w-full sm:w-auto px-9 py-4 rounded-full text-white text-sm font-bold shadow-xl flex items-center justify-center gap-3">
                        <span>Start reading</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"></path>
                        </svg>
                    </button>

                    <a href="#synopsis-section"
                       class="secondary-button w-full sm:w-auto px-9 py-4 rounded-full text-sm font-bold flex items-center justify-center gap-2">
                        Discover the story
                        <span class="text-lg">↓</span>
                    </a>
                </div>
            </div>

            <!-- Scroll indicator -->
            <div class="mt-20 flex flex-col items-center gap-3 opacity-40">
                <span class="text-[9px] uppercase tracking-[.3em] font-bold">Scroll to explore</span>
                <div class="w-px h-12 bg-current relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-5"
                         style="background:var(--accent);animation:scrollLine 1.8s ease-in-out infinite"></div>
                </div>
            </div>

        </section>


        <!-- SYNOPSIS -->
        <section id="synopsis-section" class="max-w-5xl mx-auto px-5 sm:px-8 py-20 sm:py-28">

            <div class="reveal text-center mb-12">
                <span class="text-[10px] font-extrabold uppercase tracking-[.3em] accent-text">
                    A glimpse into the story
                </span>

                <h2 class="font-serif text-3xl sm:text-4xl font-bold mt-4">
                    Before you begin.
                </h2>

                <p class="text-sm opacity-50 mt-3">
                    Every story has a beginning. This is theirs.
                </p>
            </div>


            <div class="reveal synopsis-card rounded-[2rem] p-7 sm:p-12 lg:p-16 overflow-hidden">

                <div class="flex items-center gap-3 mb-8 relative z-10">
                    <div class="w-9 h-9 rounded-xl flex items-center justify-center"
                         style="background:var(--accent-soft);color:var(--accent)">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 5.5A2.5 2.5 0 016.5 3H20v17H6.5A2.5 2.5 0 014 17.5v-12zM4 17.5A2.5 2.5 0 016.5 15H20"></path>
                        </svg>
                    </div>

                    <div>
                        <h3 class="text-xs font-extrabold uppercase tracking-[.2em] accent-text">
                            Synopsis
                        </h3>
                        <p class="text-[10px] opacity-40 mt-1">A little context before the first page</p>
                    </div>
                </div>

                <div class="relative z-10">
                    <p class="synopsis-quote">
                        <?php echo nl2br(htmlspecialchars($synopsis, ENT_QUOTES, 'UTF-8')); ?>
                    </p>
                </div>

                <div class="mt-10 pt-7 border-t flex items-center justify-between gap-4"
                     style="border-color:var(--border)">
                    <span class="text-[10px] uppercase tracking-[.2em] font-bold opacity-40">
                        The story awaits
                    </span>

                    <button onclick="openModal()"
                            class="text-xs font-bold flex items-center gap-2 accent-text group">
                        Enter the story
                        <span class="transition-transform group-hover:translate-x-1">→</span>
                    </button>
                </div>

            </div>

        </section>

    </main>


    <!-- FOOTER -->
    <footer class="border-t py-9 px-5 text-center"
            style="border-color:var(--border);background:var(--surface)">

        <div class="footer-line"></div>

        <p class="font-serif italic text-sm opacity-60">
            Some stories are not meant to be rushed.
        </p>

        <p class="text-[10px] opacity-35 mt-4 tracking-wider">
            Built with love & magic. &copy; <?php echo date('Y'); ?>
        </p>

    </footer>


    <!-- PIN MODAL -->
    <div id="pinModal"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-xl"
         role="dialog"
         aria-modal="true"
         aria-labelledby="modalTitle"
         aria-hidden="true"
         onclick="handleModalBackdrop(event)">

        <div id="modalContent"
             class="w-full max-w-md rounded-[2rem] p-7 sm:p-9 shadow-2xl border relative overflow-hidden"
             style="background:var(--bg);border-color:var(--border)">

            <!-- Modal glow -->
            <div class="absolute -top-32 -right-32 w-64 h-64 rounded-full blur-[80px] pointer-events-none"
                 style="background:var(--accent);opacity:.12"></div>

            <button type="button"
                    onclick="closeModal()"
                    aria-label="Close PIN dialog"
                    class="absolute top-5 right-5 w-9 h-9 rounded-full flex items-center justify-center opacity-50 hover:opacity-100 hover:rotate-90 transition-all text-xl">
                &times;
            </button>

            <div class="relative z-10">

                <div class="text-center mb-8">

                    <div class="w-14 h-14 rounded-2xl mx-auto mb-5 flex items-center justify-center text-white shadow-lg"
                         style="background:var(--accent);box-shadow:0 10px 30px var(--accent-soft)">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <rect x="4" y="10" width="16" height="11" rx="2"></rect>
                            <path stroke-linecap="round" d="M8 10V7a4 4 0 118 0v3"></path>
                        </svg>
                    </div>

                    <span class="text-[10px] font-bold uppercase tracking-[.25em] accent-text">
                        A little privacy
                    </span>

                    <h2 id="modalTitle" class="font-serif font-bold text-2xl mt-2">
                        The story is locked.
                    </h2>

                    <p class="text-xs opacity-50 mt-3 leading-relaxed">
                        Enter your six-digit access PIN to continue reading.
                    </p>
                </div>


                <?php if (!empty($error)): ?>
                    <div id="pinError"
                         class="mb-5 p-3 rounded-xl text-xs text-center font-semibold border border-rose-300/40 bg-rose-500/10 text-rose-500">
                        <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                <?php endif; ?>


                <form method="POST" id="pinForm" class="space-y-7">

                    <div class="flex justify-center gap-2 sm:gap-3">
                        <?php for ($i = 0; $i < 6; $i++): ?>
                            <input
                                type="password"
                                maxlength="1"
                                inputmode="numeric"
                                pattern="[0-9]"
                                name="pin[]"
                                data-index="<?php echo $i; ?>"
                                aria-label="PIN digit <?php echo $i + 1; ?>"
                                autocomplete="<?php echo $i === 0 ? 'one-time-code' : 'off'; ?>"
                                required
                                class="pin-input w-10 h-12 sm:w-12 sm:h-14 text-center text-xl font-bold rounded-xl border-2 outline-none"
                                style="background:var(--surface);border-color:var(--border);color:var(--text)"
                            >
                        <?php endfor; ?>
                    </div>


                    <button type="submit"
                            class="primary-button w-full py-4 rounded-xl text-white text-sm font-bold shadow-lg flex items-center justify-center gap-2">
                        Unlock the story
                        <span>→</span>
                    </button>

                </form>

                <p class="text-[10px] opacity-35 text-center mt-7">
                    A private story, shared with intention.
                </p>

            </div>
        </div>
    </div>


    <script>
        const htmlRoot = document.getElementById('htmlRoot');
        const modal = document.getElementById('pinModal');
        const modalContent = document.getElementById('modalContent');
        const pinInputs = [...document.querySelectorAll('.pin-input')];

        let previousFocus = null;


        /* ---------------------------------
           THEME
        --------------------------------- */

        function applyTheme(theme) {
            htmlRoot.classList.toggle('dark', theme === 'dark');

            document.getElementById('sunIcon').classList.toggle('hidden', theme !== 'dark');
            document.getElementById('moonIcon').classList.toggle('hidden', theme === 'dark');

            localStorage.setItem('theme', theme);

            document.querySelector('meta[name="theme-color"]')
                .setAttribute('content', theme === 'dark' ? '#0A0B0E' : '#FAF8F5');
        }

        const savedTheme = localStorage.getItem('theme');

        const preferredTheme = window.matchMedia('(prefers-color-scheme: dark)').matches
            ? 'dark'
            : 'light';

        applyTheme(savedTheme || preferredTheme);

        function toggleTheme() {
            applyTheme(htmlRoot.classList.contains('dark') ? 'light' : 'dark');
        }


        /* ---------------------------------
           PARTICLES
        --------------------------------- */

        const particleContainer = document.getElementById('particles');

        for (let i = 0; i < 24; i++) {
            const particle = document.createElement('span');

            particle.className = 'particle';

            particle.style.left = `${Math.random() * 100}%`;
            particle.style.animationDuration = `${14 + Math.random() * 20}s`;
            particle.style.animationDelay = `${Math.random() * -25}s`;
            particle.style.opacity = `${0.15 + Math.random() * 0.3}`;

            particleContainer.appendChild(particle);
        }


        /* ---------------------------------
           SCROLL REVEAL
        --------------------------------- */

        const revealElements = document.querySelectorAll('.reveal');

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.12,
                rootMargin: '0px 0px -40px 0px'
            });

            revealElements.forEach(element => observer.observe(element));
        } else {
            revealElements.forEach(element => element.classList.add('visible'));
        }


        /* ---------------------------------
           PIN MODAL
        --------------------------------- */

        function openModal() {
            previousFocus = document.activeElement;

            modal.classList.add('active');
            modal.setAttribute('aria-hidden', 'false');

            document.body.style.overflow = 'hidden';

            setTimeout(() => {
                pinInputs[0].focus();
            }, 250);
        }

        function closeModal() {
            modal.classList.remove('active');
            modal.setAttribute('aria-hidden', 'true');

            document.body.style.overflow = '';

            if (previousFocus) {
                previousFocus.focus();
            }
        }

        function handleModalBackdrop(event) {
            if (event.target === modal) {
                closeModal();
            }
        }

        // Escape key closes the modal
        document.addEventListener('keydown', event => {
            if (event.key === 'Escape' && modal.classList.contains('active')) {
                closeModal();
            }

            // Keep keyboard focus inside the dialog
            if (event.key === 'Tab' && modal.classList.contains('active')) {
                const focusable = modal.querySelectorAll('button, input');
                const first = focusable[0];
                const last = focusable[focusable.length - 1];

                if (event.shiftKey && document.activeElement === first) {
                    event.preventDefault();
                    last.focus();
                } else if (!event.shiftKey && document.activeElement === last) {
                    event.preventDefault();
                    first.focus();
                }
            }
        });


        /* ---------------------------------
           PIN INPUT HANDLING
        --------------------------------- */

        pinInputs.forEach((input, index) => {

            input.addEventListener('input', () => {
                input.value = input.value.replace(/[^0-9]/g, '').slice(0, 1);

                if (input.value && index < pinInputs.length - 1) {
                    pinInputs[index + 1].focus();
                }
            });

            input.addEventListener('keydown', event => {
                if (event.key === 'Backspace' && !input.value && index > 0) {
                    pinInputs[index - 1].focus();
                }

                if (event.key === 'ArrowLeft' && index > 0) {
                    pinInputs[index - 1].focus();
                }

                if (event.key === 'ArrowRight' && index < pinInputs.length - 1) {
                    pinInputs[index + 1].focus();
                }
            });

            input.addEventListener('focus', () => {
                input.select();
            });

        });


        // Allow users to paste the complete PIN
        pinInputs[0].addEventListener('paste', event => {
            event.preventDefault();

            const pasted = event.clipboardData
                .getData('text')
                .replace(/[^0-9]/g, '')
                .slice(0, 6);

            pasted.split('').forEach((digit, index) => {
                pinInputs[index].value = digit;
            });

            const nextEmpty = pinInputs.find(input => !input.value);

            if (nextEmpty) {
                nextEmpty.focus();
            } else {
                pinInputs[5].focus();
            }
        });


        /* ---------------------------------
           ERROR STATE
        --------------------------------- */

        <?php if (!empty($error)): ?>
            window.addEventListener('DOMContentLoaded', () => {
                openModal();

                modalContent.classList.add('shake');

                setTimeout(() => {
                    modalContent.classList.remove('shake');
                }, 500);

                pinInputs.forEach(input => input.value = '');
            });
        <?php endif; ?>


        /* ---------------------------------
           SCROLL INDICATOR ANIMATION
        --------------------------------- */
    </script>

    <style>
        @keyframes scrollLine {
            0% {
                transform: translateY(-100%);
            }
            100% {
                transform: translateY(250%);
            }
        }
    </style>

</body>
</html>
