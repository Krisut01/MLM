import './bootstrap';

const storageKey = 'leafchain-theme';
const root = document.documentElement;

function preferredTheme() {
    const stored = localStorage.getItem(storageKey);

    if (stored === 'dark' || stored === 'light') {
        return stored;
    }

    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
}

function applyTheme(theme) {
    root.classList.toggle('dark', theme === 'dark');
    root.dataset.theme = theme;
}

applyTheme(preferredTheme());

window.leafchainTheme = {
    current: () => root.classList.contains('dark') ? 'dark' : 'light',
    toggle: () => {
        const nextTheme = root.classList.contains('dark') ? 'light' : 'dark';
        localStorage.setItem(storageKey, nextTheme);
        applyTheme(nextTheme);
        window.dispatchEvent(new CustomEvent('leafchain-theme-change', { detail: { theme: nextTheme } }));
        return nextTheme;
    },
};
