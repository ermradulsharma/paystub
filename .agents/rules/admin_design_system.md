# PaystubX Admin Design System Rules

Guidelines for maintaining the 2026 Apple / Stripe / Vercel Ultra-High Density Minimalist Light UX design system across all admin Blade views and stylesheet assets.

## 🎨 Color Palette & Typography Tokens

- **App Background:** `#f8fafc` (Slate 50)
- **Card Background:** `#ffffff` (Pure White) with `1px solid #e2e8f0` hairline borders
- **Primary Brand Indigo:** `#4f46e5`
- **Emerald Accent:** `#059669`
- **Amber Accent:** `#d97706`
- **Rose Accent:** `#e11d48`
- **Main Typography:** `'Plus Jakarta Sans', sans-serif`

---

## 📐 Density & Layout Constraints

1. **Header Toolbar Height:** Maximum `44px`.
2. **Sidebar Navigation Width:** Compact `200px` with `scrollbar-width: none`.
3. **Main Workspace Padding (`#main`):** Ultra-high density `10px 14px`.
4. **Card Height Behavior:** All `.apple-card` components MUST have `height: auto` by default to naturally shrink-wrap around their content instead of stretching vertically. Use `.apple-card.h-100` explicitly only when side-by-side equal height columns are required.
5. **Card Content Spacing:** `.apple-card` padding MUST be set to `18px 22px`.
6. **Vercel Settings Tabs:** Active sub-sidebar pills MUST use Ice Indigo background (`#eef2ff`), Deep Royal text (`#4338ca`), and color-coded SVG icons.

---

## 🚫 Anti-Patterns to Avoid

- DO NOT use generic browser colors (plain red, plain blue, plain green).
- DO NOT add excessive padding or margins that reduce screen information density.
- DO NOT break sidebar collapse/expand transitions. Workspace `#main` MUST expand smoothly to fill 100% of screen width when sidebar is toggled.
