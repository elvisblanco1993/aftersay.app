import { Editor } from "@tiptap/core";
import StarterKit from "@tiptap/starter-kit";

// resources/app.js
window.setupEditor = function (content) {
    let editor;

    return {
        content: content,
        preview: false,

        init(element) {
            editor = new Editor({
                element: element,
                editorProps: {
                    attributes: {
                        class: "w-full max-w-full min-h-60 prose prose-sm dark:prose-invert border rounded-lg block dark:shadow-none appearance-none py-2 px-3 bg-white dark:bg-white/10 placeholder-zinc-400 dark:text-zinc-300 dark:placeholder-zinc-400 shadow-xs border-zinc-200 border-b-zinc-300/80 dark:border-white/10",
                    },
                },
                extensions: [
                    StarterKit.configure({
                        heading: {
                            levels: [2, 3, 4],
                        },
                    }),
                ],
                content: this.content,
                onUpdate: ({ editor }) => {
                    this.content = editor.getHTML();
                },
            });

            this.editor = editor;

            this.toggleBold = () => editor.chain().focus().toggleBold().run();
            this.toggleItalic = () => editor.chain().focus().toggleItalic().run();
            this.toggleH2 = () =>  editor.chain().focus().toggleHeading({ level: 2 }).run();
            this.toggleH3 = () =>  editor.chain().focus().toggleHeading({ level: 3 }).run();
            this.toggleH4 = () =>  editor.chain().focus().toggleHeading({ level: 4 }).run();
            this.toggleOrderedList = () =>  editor.chain().focus().toggleOrderedList().run();
            this.toggleBulletList = () =>  editor.chain().focus().toggleBulletList().run();

            this.$watch("content", (content) => {
                // If the new content matches TipTap's then we just skip.
                if (content === editor.getHTML()) return;

                editor.commands.setContent(content, false);
            });
            editor.commands.setContent(this.content, false);
        },
    };
};
