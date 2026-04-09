<template>
    <svg :class="$attrs.class" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <!-- Bridge arch -->
        <path d="M4 28 Q20 4 36 28" stroke="currentColor" stroke-width="3" stroke-linecap="round" fill="none" />
        <!-- Bridge deck -->
        <line x1="2" y1="28" x2="38" y2="28" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" />
        <!-- Left pillar -->
        <line x1="12" y1="18" x2="12" y2="28" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
        <!-- Right pillar -->
        <line x1="28" y1="18" x2="28" y2="28" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
        <!-- Ticket notch left -->
        <circle cx="2" cy="28" r="1.5" fill="currentColor" />
        <!-- Ticket notch right -->
        <circle cx="38" cy="28" r="1.5" fill="currentColor" />
        <!-- Cable lines -->
        <line x1="20" y1="8" x2="8" y2="28" stroke="currentColor" stroke-width="1" opacity="0.5" />
        <line x1="20" y1="8" x2="32" y2="28" stroke="currentColor" stroke-width="1" opacity="0.5" />
    </svg>
</template>
