# 📐 Unified Dashboard Structure - Visual Guide

## 🏗️ Standard Dashboard Page Architecture

```
┌─────────────────────────────────────────────────────────────┐
│  <x-layout.dashboard title="العنوان">                      │
│                                                             │
│  ┌──────────────────────────────────────────────────────┐  │
│  │  Header Section                                      │  │
│  │  ┌────────────────────┐   ┌──────────────────────┐  │  │
│  │  │ Title              │   │ <x-ui.button>       │  │  │
│  │  │ (text-3xl bold)    │   │ (color="primary")   │  │  │
│  │  ├────────────────────┤   └──────────────────────┘  │  │
│  │  │ Subtitle           │                              │  │
│  │  │ (text-gray-600)    │                              │  │
│  │  └────────────────────┘                              │  │
│  └──────────────────────────────────────────────────────┘  │
│  mb-6                                                      │
│                                                             │
│  ┌──────────────────────────────────────────────────────┐  │
│  │  <x-ui.alert type="success">                        │  │
│  │  Success message here                               │  │
│  │  </x-ui.alert>                                      │  │
│  └──────────────────────────────────────────────────────┘  │
│  mb-6                                                      │
│                                                             │
│  ┌──────────────────────────────────────────────────────┐  │
│  │  Grid Container (grid grid-cols-1 md:grid-cols-2    │  │
│  │                  lg:grid-cols-3 gap-6)              │  │
│  │                                                      │  │
│  │  ┌─────────────┐  ┌─────────────┐  ┌─────────────┐ │  │
│  │  │ <x-ui.card> │  │ <x-ui.card> │  │ <x-ui.card> │ │  │
│  │  │             │  │             │  │             │ │  │
│  │  │ Content     │  │ Content     │  │ Content     │ │  │
│  │  │             │  │             │  │             │ │  │
│  │  │ Link/Action │  │ Link/Action │  │ Link/Action │ │  │
│  │  └─────────────┘  └─────────────┘  └─────────────┘ │  │
│  │                                                      │  │
│  │  (If multiple rows)                                │  │
│  │  ┌─────────────┐  ┌─────────────┐  ┌─────────────┐ │  │
│  │  │ <x-ui.card> │  │ <x-ui.card> │  │ <x-ui.card> │ │  │
│  │  │             │  │             │  │             │ │  │
│  │  └─────────────┘  └─────────────┘  └─────────────┘ │  │
│  └──────────────────────────────────────────────────────┘  │
│                                                             │
│  OR                                                         │
│                                                             │
│  ┌──────────────────────────────────────────────────────┐  │
│  │  <x-ui.alert type="info">                           │  │
│  │  ℹ️ No items available                             │  │
│  │  </x-ui.alert>                                      │  │
│  └──────────────────────────────────────────────────────┘  │
│                                                             │
│  </x-layout.dashboard>                                    │
└─────────────────────────────────────────────────────────────┘
```

---

## 📦 Card Structure (Inside Grid)

### Simple Card
```
┌─────────────────────────┐
│ <x-ui.card>             │
│ ┌───────────────────┐   │
│ │ Title             │   │
│ │ (text-lg bold)    │   │
│ ├───────────────────┤   │
│ │ Description       │   │
│ │ (text-gray-600)   │   │
│ ├───────────────────┤   │
│ │ <x-ui.badge>      │   │
│ │ color="blue"      │   │
│ └───────────────────┘   │
│ </x-ui.card>            │
└─────────────────────────┘
```

### Card with Image
```
┌─────────────────────────┐
│ <x-ui.card>             │
│ ┌─────────────────────┐ │
│ │   [Image]           │ │
│ │   h-48              │ │
│ ├─────────────────────┤ │
│ │ Title               │ │
│ │ Description         │ │
│ │ <x-ui.badge>       │ │
│ ├─────────────────────┤ │
│ │ <a> link/action </a> │ │
│ └─────────────────────┘ │
│ </x-ui.card>            │
└─────────────────────────┘
```

---

## 🎨 Color Palette

### Typography
```
├─ text-gray-900    (Headlines)
├─ text-gray-600    (Body Text)
├─ text-gray-500    (Secondary Text)
└─ text-gray-400    (Icons)
```

### Backgrounds
```
├─ bg-white         (Cards)
├─ bg-gray-50       (Light sections)
├─ bg-gray-100      (Placeholders)
└─ bg-*-50/100      (Colored backgrounds)
```

### Borders
```
├─ border-gray-200  (Primary border)
├─ border-gray-100  (Light border)
└─ border-*-500     (Colored borders)
```

### Actions
```
├─ text-blue-600    (Links)
├─ hover:text-blue-800
├─ text-green-600   (Success)
├─ text-red-600     (Danger)
└─ text-yellow-600  (Warning)
```

---

## 📏 Spacing System

```
Vertical Spacing:
├─ mb-6  (Large sections)
├─ mb-4  (Medium items)
├─ mt-1  (Small spacing)
└─ pt-4  (Padding top)

Horizontal Spacing:
├─ px-4  (Padding)
├─ gap-6 (Grid gaps)
└─ gap-2 (Small gaps)
```

---

## 🎯 Component Hierarchy

```
<x-layout.dashboard>
│
├─ Header Section
│  ├─ Title (text-3xl)
│  ├─ Subtitle (text-gray-600)
│  └─ <x-ui.button>
│
├─ Alert Section (if needed)
│  └─ <x-ui.alert type="success">
│
├─ Content Grid
│  └─ <x-ui.card>
│     ├─ Image (optional)
│     ├─ Title
│     ├─ Description
│     ├─ Badge(s)
│     └─ Action Link
│
└─ Empty State (if no items)
   └─ <x-ui.alert type="info">
```

---

## 📱 Responsive Breakpoints

```
Mobile (< 768px)
└─ grid grid-cols-1
   └─ 1 column

Tablet (768px - 1024px)
└─ md:grid-cols-2
   └─ 2 columns

Desktop (> 1024px)
└─ lg:grid-cols-3
   └─ 3 columns
```

---

## ✅ Checklist for New Pages

```
Structure:
☐ <x-layout.dashboard title="...">
☐ Header with title and subtitle
☐ mb-6 spacing after header

Content:
☐ <x-ui.alert> for success message
☐ <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
☐ <x-ui.card> for each item
☐ <x-ui.badge> for status/type
☐ Action link at bottom

Empty State:
☐ <x-ui.alert type="info"> when no items
☐ Centered icon
☐ Message text

Components:
☐ Use <x-ui.button> only
☐ Use <x-ui.badge> only
☐ Use <x-ui.alert> only
☐ Use <x-ui.card> only

Styling:
☐ No Bootstrap classes
☐ No inline styles
☐ Tailwind CSS only
☐ Font Awesome icons only

Colors:
☐ text-3xl font-bold text-gray-900 (title)
☐ text-gray-600 (subtitle)
☐ text-lg font-semibold text-gray-900 (card title)
☐ text-gray-600 text-sm (description)
☐ border-gray-200 (borders)

Spacing:
☐ mb-6 after header
☐ gap-6 for grid
☐ mb-4 between items
☐ mt-1 for small spacing
```

---

## 🚀 Quick Template

Copy & paste this for new Dashboard pages:

```blade
<x-layout.dashboard title="الصفحة الجديدة">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">العنوان</h1>
            <p class="text-gray-600 mt-1">الوصف</p>
        </div>
        @can('manage resource')
        <x-ui.button href="{{ route('...') }}" color="primary">
            <i class="fas fa-cog"></i> إدارة
        </x-ui.button>
        @endcan
    </div>

    <!-- Alert -->
    @if(session('success'))
    <x-ui.alert type="success" class="mb-6">
        {{ session('success') }}
    </x-ui.alert>
    @endif

    <!-- Content -->
    @if($items->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($items as $item)
        <x-ui.card class="h-full flex flex-col hover:shadow-lg transition-shadow">
            <h3 class="text-lg font-semibold text-gray-900">{{ $item->title }}</h3>
            <p class="text-gray-600 text-sm mt-2">{{ $item->description }}</p>
            
            <div class="mt-4">
                <x-ui.badge color="blue">Status</x-ui.badge>
            </div>
            
            <div class="mt-auto pt-4 border-t border-gray-200">
                <a href="{{ route(...) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-medium gap-1">
                    View Details
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </x-ui.card>
        @endforeach
    </div>
    @else
    <x-ui.alert type="info" class="text-center">
        <i class="fas fa-info-circle text-4xl text-blue-400"></i>
        <p class="text-gray-700 font-medium mt-2">No items available</p>
    </x-ui.alert>
    @endif
</x-layout.dashboard>
```

---

## 📚 More Resources

- DASHBOARD_QUICK_CHECK.md
- DASHBOARD_MAINTENANCE_GUIDE.md
- BEFORE_AFTER_COMPARISON.md

---

Done! 🎉
