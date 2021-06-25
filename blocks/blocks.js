var el = wp.element.createElement;

wp.blocks.registerBlockType('freisamkeit/abstract-block', {
   title: 'Abstract',
   icon: 'text-page',
   category: 'common',
   attributes: {
      content: {
        type: 'array',
        source: 'children',
        selector: 'p'
      }
   },
   edit: function(props) {
     function updateContent(newdata) {
        props.setAttributes({content: newdata});
     }

     return el('div',
        {
           className: 'abstract-box'
        },
        el(
           wp.editor.RichText,
           {
              tagName: 'p',
              onChange: updateContent,
              value: props.attributes.content,
              placeholder: 'Enter abstract here...'
           }
        ),
        el('hr', {
          class: 'wp-block-separator',
        }),
     );
   },
   save: function(props) {
     return el('div',
        {
           className: 'abstract-box'
        },
        el(wp.editor.RichText.Content, {
           tagName: 'p',
           value: props.attributes.content
        }),
        el('hr', {
          class: 'wp-block-separator',
        }),
     );
  }
});
