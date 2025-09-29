---
applyTo: '**'
---
This repo builds the new KISS Aquatics site at https://new.kissaquatics.com using:
The content of the site excluding reservation feature is to be pulled from https://kissaquatics.com
and integrated in this site.
The server path for current workspace is /var/www/clients/client28/web67/web$
Laravel (latest stable)

Livewire v3 for all interactive pages (frontend and admin). Use $this->dispatch for Livewire 3 browser events.

Bootstrap (no Tailwind) for styling & responsive layout.

All content editable from an Admin (Livewire-based) panel.

Follow the design reference www.swimfloatswim.com for layout and UX only (NOT exact colors). Use color palette inspired by the attached image - saved in webroot -target-look.jpg

SEO optimized pages and proper meta management.

Livewire

Use Livewire 3 for all interactive pages (public and admin).

Use $this->dispatch('eventName', payload) for browser events (Livewire 3 recommended pattern).

Keep components granular: HeroBanner, ProgramsList, PricingCard, LocationsList, ContactBlock, Admin/PagesEditor, etc.

Bootstrap

Use Bootstrap 5.x via npm + Vite.

Create a small custom SCSS file for the color tokens (matching attached image palette) and import after bootstrap to override variables.

Do not add Tailwind.

Database / Models

Models for dynamic content (examples): Page, Program, Location, InstructorNote, PricingPlan, SiteSetting, FAQ, Video, ContactInfo.

Content should be stored as structured fields, not HTML blobs where possible. Use a WYSIWYG (Trix/Quill) for long content, stored sanitized in DB.

Admin should allow image uploads (logo, hero, program images) and manage file storage (use storage:link).

Admin Panel

Fully Livewire-driven admin (no separate Vue/React).

Admin pages:

Pages editor (create/edit home, about, programs, contact, SEO meta)

Programs (Survival / Continuing / Swim Like A Fish)

Locations (emails/phones)

Pricing (editable amounts per location)

Videos (3 allowed on About page)

FAQ (Q&A items)

Site Settings (logo, top nav links, contact emails)

Booking shortcut (link to Momence — external)

Role-based access (admin only). Provide seed user and a migration for roles.

Content & SEO

Every Page must have editable: title, slug, meta_title, meta_description, meta_robots, canonical, og_image.

Add sitemap.xml generator & robots.txt. Add structured data schema for Program and Organization where appropriate.

Ensure semantic HTML5, proper heading hierarchy, and proper use of aria-* attributes.

Routing & Blade

Public routes use simple controllers that mount Livewire components where necessary:

/ -> Home Livewire

/about -> About Livewire

/programs/survival -> ProgramShow Livewire (slug-based)

/programs/continuing etc.

/contact -> ContactForm Livewire

Blade layout with a header partial (top bar with links & booking/calendar shortcut) and footer.

Accessibility

Keyboard navigable, alt texts for images, color contrast check for chosen palette.

Performance

Use Vite + cache-busted assets.

Lazy-load large images, generate responsive sizes.

Use server-side caching for menus and static CMS content (cache tags on update).

Tests

Add feature tests for public pages rendering, admin CRUD, and an SEO meta test.

5 — Data & Content Migration

Create seeders to import existing site content (where possible) into pages, programs, pricing etc.

Keep the content editable in admin. Refer to the uploaded spec for textual content and pricing per location.

6.Security & Privacy

Sanitize WYSIWYG content.

Admin authentication: strong password + optional 2FA (recommend).

File upload validation and virus/malware scanning if possible.

7 — Client-specific items (from uploaded spec)

Implement these features (directly from client file):

Top bar with HOME ABOUT PROGRAMS CLIENT PORTAL CONTACT US. ABOUT subpages: Locations, Pricing, Our Instructors, The Rules, Videos, Q&A. PROGRAMS split into two side-by-side page links (Survival Program & Continuing Education). CLIENT PORTAL links to Momence. Pricing per-location values (Twinsburg $480, Mayfield $480, Brooklyn $500, Independence $500) and continuing education 12 lessons $225 etc. Videos: limit to 3. Q&A content and rules per spec should be editable in admin. Remove pages flagged by client (calendar, testimonials, adults/big kids) from nav. Add the drowning statistics line at home bottom. (See uploaded spec). 

new website info[1]

8 — Deliverables & milestones (suggested)

Repo skeleton + auth + admin layout (Livewire)

Models & migrations + seed data from old site + CMS pages editor

Frontend pages (Home, About, Programs, Contact) using Livewire components and Bootstrap

Pricing & Locations + Client Portal link

SEO, sitemap, robots + tests

Deploy to staging staging.new.kissaquatics.com then new.kissaquatics.com

9 — Final notes / Developer conventions

Use PSR-12 coding standard.

Use php artisan make:livewire patterns and keep class and blade names consistent.

For Livewire 3 event flows, always use $this->dispatch.

Keep all content editable and avoid hard-coded text.

Always run npm run build for production deploys (this was a recurring issue — remind team in PRs).

Additonal notes:
I have already set the public folder for laravel root in ispconfig - show we need not add public to the path when accessing the routes.