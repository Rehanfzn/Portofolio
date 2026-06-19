import Alpine from 'alpinejs'
window.Alpine = Alpine

Alpine.data('theme', () => ({
    dark: document.documentElement.classList.contains('dark'),
    init() {
        this.$watch('dark', val => {
            document.documentElement.classList.toggle('dark', val)
            localStorage.setItem('theme', val ? 'dark' : 'light')
        })
    },
    toggle() {
        this.dark = !this.dark
    }
}))

Alpine.data('photoSphere', () => ({
    loaded: false,
    colored: false,
    rotateX: -10,
    rotateY: -15,
    dragging: false,
    lastX: 0,
    lastY: 0,
    vx: 0,
    vy: 0,
    raf: null,
    get cardStyle() {
        const transform = `rotateX(${this.rotateX}deg) rotateY(${this.rotateY}deg)`
        const transition = this.dragging || this.raf ? 'none' : 'transform 0.6s cubic-bezier(0.22, 1, 0.36, 1)'
        return `transform: ${transform}; transition: ${transition}`
    },
    get imgStyle() {
        const filter = this.colored ? 'none' : 'grayscale(1)'
        return `filter: ${filter}; transition: filter 0.5s ease`
    },
    startDrag(e) {
        if (this.raf) { cancelAnimationFrame(this.raf); this.raf = null }
        this.dragging = true
        this.vx = 0
        this.vy = 0
        const p = e.touches ? e.touches[0] : e
        this.lastX = p.clientX
        this.lastY = p.clientY
    },
    onDrag(e) {
        if (!this.dragging) return
        const p = e.touches ? e.touches[0] : e
        const dx = p.clientX - this.lastX
        const dy = p.clientY - this.lastY
        this.vx = dx * 0.8
        this.vy = -dy * 0.8
        this.rotateY += this.vx
        this.rotateX += this.vy
        this.lastX = p.clientX
        this.lastY = p.clientY
    },
    endDrag() {
        this.dragging = false
        if (Math.abs(this.vx) < 0.05 && Math.abs(this.vy) < 0.05) return
        const step = () => {
            this.vx *= 0.92
            this.vy *= 0.92
            this.rotateY += this.vx
            this.rotateX += this.vy
            if (Math.abs(this.vx) > 0.01 || Math.abs(this.vy) > 0.01) {
                this.raf = requestAnimationFrame(step)
            } else {
                this.vx = 0
                this.vy = 0
                this.raf = null
            }
        }
        this.raf = requestAnimationFrame(step)
    },
    toggleColor() {
        this.colored = !this.colored
    }
}))

Alpine.data('projectModal', () => ({
    selected: null,
    open(project) {
        this.selected = project
        document.body.style.overflow = 'hidden'
    },
    close() {
        this.selected = null
        document.body.style.overflow = ''
    },
    init() {
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape' && this.selected) this.close()
        })
    }
}))

Alpine.start()

document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('section[id]')
    const navLinks = document.querySelectorAll('.nav-link')

    const navObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                navLinks.forEach(link => {
                    link.classList.remove('text-indigo-400')
                    link.classList.add('text-zinc-400')
                    if (link.getAttribute('href') === '#' + entry.target.id) {
                        link.classList.remove('text-zinc-400')
                        link.classList.add('text-indigo-400')
                    }
                })
            }
        })
    }, { threshold: 0.3, rootMargin: '-100px 0px 0px 0px' })

    sections.forEach(s => navObserver.observe(s))

    const revealElements = document.querySelectorAll('.reveal')
    const revealObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-up')
                revealObserver.unobserve(entry.target)
            }
        })
    }, { threshold: 0.1 })

    revealElements.forEach(el => revealObserver.observe(el))

    document.addEventListener('keydown', e => {
        if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') return
        const map = { '1': 'about', '2': 'experience', '3': 'skills', '4': 'projects', '5': 'certificates', '6': 'contact', 't': 'theme' }
        const id = map[e.key]
        if (!id) return
        if (id === 'theme') {
            const themeBtn = document.querySelector('[data-theme-toggle]')
            if (themeBtn) themeBtn.click()
            return
        }
        const el = document.getElementById(id)
        if (el) el.scrollIntoView({ behavior: 'smooth' })
    })
})
