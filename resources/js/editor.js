import ClassicEditor from "ckeditor5/build/ckeditor";
var toolbarOptions = [
    "heading",
    "|",
    "bold",
    "italic",
    "underline",
    "subscript",
    "superscript",
    "|",
    "code",
    "codeBlock",
    "blockQuote",
    "|",
    "alignment",
    "bulletedList",
    "numberedList",
    "|",
    "fontColor",
    "fontSize",
    "fontBackgroundColor",
    "|",
    "uploadImage",
    "link",
    "mediaEmbed",
    "|",
    "undo",
    "redo",
];

ClassicEditor.create(document.querySelector("#editor"), {
        toolbar: toolbarOptions,
        image: {
            toolbar: ["imageStyle:full", "imageStyle:side", "imageTextAlternative"],
            styles: ["full", "side"],
        },
        simpleUpload: {
            uploadUrl: "http://127.0.0.1:8000/upload_image",
            withCredentials: true,
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                    .content,
            },
        },
    })
    .then((editor) => {
        console.log("Editor was initialized", editor);
    })
    .catch((error) => {
        console.error(error.stack);
    });