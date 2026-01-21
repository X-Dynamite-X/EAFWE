<x-dashboard.show-page
    :title="$training_program->title"
    subtitle="تفاصيل البرنامج"
    :image="$training_program->image_url"
    :description="$training_program->description"
    :content="$training_program->content"
    :show_sidebar="false"
/>
