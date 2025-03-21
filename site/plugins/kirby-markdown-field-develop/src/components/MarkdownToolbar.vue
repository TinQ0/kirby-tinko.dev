<!-- eslint-disable vue/no-v-html -->
<template>
  <nav class="k-markdown-toolbar">
    <!-- <div class="k-markdown-toolbar-wrapper"> -->
    <template
      v-for="({ button, name, isActive, isDisabled }, buttonIndex) in layout"
    >
      <!-- divider -->
      <template v-if="button.divider">
        <hr
          :key="buttonIndex"
          aria-orientation="vertical"
          class="k-markdown-toolbar-divider"
        />
      </template>

      <!-- dropdown -->
      <template v-else-if="button.dropdown">
        <div :key="buttonIndex">
          <k-button
            :key="buttonIndex"
            :icon="button.icon"
            :title="button.label"
            tabindex="-1"
            :class="
              (isDisabled() ? 'is-disabled ' : '') + 'k-markdown-toolbar-button'
            "
            @click="$refs[buttonIndex + '-dropdown'][0].toggle()"
          />
          <k-dropdown-content
            :ref="buttonIndex + '-dropdown'"
            @open="setOpen($refs[buttonIndex + '-dropdown'][0])"
            @close="setOpen(null)"
          >
            <k-dropdown-item
              v-for="(dropdownItem, dropdownItemIndex) in button.dropdown"
              :key="dropdownItemIndex"
              :icon="dropdownItem.icon"
              :current="active.includes(dropdownItem.token)"
              @click="dropdownItem.command"
              ><span v-html="dropdownItem.label" /></k-dropdown-item>
          </k-dropdown-content>
        </div>
      </template>

      <!-- single button -->
      <template v-else>
        <k-button
          :key="buttonIndex"
          :icon="button.icon"
          :title="button.label"
          :class="
            (isDisabled() ? 'is-disabled ' : '') +
            (isActive() || (name === 'invisibles' && invisibles)
              ? 'is-active '
              : '') +
            'k-markdown-toolbar-button' +
            (button.align === 'right' ? ' k-markdown-toolbar-button-right' : '')
          "
          tabindex="-1"
          @click="button.command"
        />
      </template>
    </template>
    <!-- </div> -->
  </nav>
</template>

<script>
export default {
  props: {
    id: String,
    buttons: Array,
    editor: Object,
    modals: Boolean,
    invisibles: Boolean,
    uploads: [Boolean, Object, Array],
    active: Array
  },
  data() {
    return {
      open: null
    };
  },
  computed: {
    layout() {
      // ensure, that invisibles item always comes last
      let layout = this.buttons.toSorted((a, b) => {
        if (a.name === "invisibles") return 1;
        if (b.name === "invisibles") return -1;
        return 0;
      });

      // cache layout, to getters of button extensions are not
      // called every time the editor updates.
      layout = layout.map((item) => {
        return {
          button: item.button,
          name: item.name,
          isActive: item.isActive,
          isDisabled: item.isDisabled
        };
      });

      return layout;
    }
  },
  methods: {
    setOpen(dropdown = null) {
      this.open = dropdown;
    },
    closeDropdowns() {
      if (this.open) {
        this.open.close();
      }
    }
  }
};
</script>

<style>
:root {
  --markdown-toolbar-size: var(--height);
  --markdown-toolbar-text: light-dark(var(--color-black), var(--color-white));
  --markdown-toolbar-back: light-dark(var(--color-white), var(--color-gray-850));
  --markdown-toolbar-hover: light-dark(var(--color-gray-200), var(--color-gray-750));
  --markdown-toolbar-border: var(--panel-color-back);
  --markdown-toolbar-current: var(--color-focus);
}

:where(.k-markdown-input-wrap):not(:focus-within) {
  --markdown-toolbar-text: light-dark(var(--color-gray-300), var(--color-gray-700));
}

.k-markdown-toolbar {
  height: auto;
  background: var(--markdown-toolbar-back);
  border-start-start-radius: var(--rounded);
  border-start-end-radius: var(--rounded);
  color: var(--markdown-toolbar-text);
  border-block-end: 1px solid var(--markdown-toolbar-border);
  min-height: var(--markdown-toolbar-size);
  max-width: 100%;
  display: flex;
  overflow-x: auto;
  overflow-y: hidden;
}

/* .k-markdown-toolbar-wrapper {
  max-width: 100%;
  display: flex;
  overflow-x: auto;
  overflow-y: hidden;
} */

.k-markdown-toolbar-button {
  width: 32px;
  height: 32px;
}

.k-markdown-toolbar-divider {
  width: 1px;
  border-width: 0;
  background: var(--markdown-toolbar-border);
}

/* disabled state of toolbar buttons */
.k-markdown-toolbar .k-markdown-toolbar-button.is-disabled {
  opacity: 0.25;
  pointer-events: none;
}

/* Editor has focus */
.k-markdown-input-wrap:focus-within .k-markdown-toolbar {
  box-shadow: rgba(0, 0, 0, 0.05) 0 2px 5px;
  left: 0;
  position: sticky;
  right: 0;
  top: var(--header-sticky-offset);
  z-index: 4;
}

.k-markdown-input-wrap .k-markdown-toolbar .k-markdown-toolbar-button:hover {
  background: var(--markdown-toolbar-hover);
}

.k-markdown-input-wrap:focus-within
  .k-markdown-toolbar
  .k-markdown-toolbar-button.is-active {
  color: var(--markdown-toolbar-current);
}

.k-markdown-input-wrap:focus-within
  .k-markdown-toolbar
  .k-markdown-toolbar-button.is-active:hover {
  background: rgba(66, 113, 174, 0.075);
}

/* Align invisibles button to the right of the toolbar */
.k-markdown-toolbar-button-right {
  border-left: 1px solid var(--color-background);
  margin-left: auto;
}

/** Active state for dropdown items */
.k-markdown-toolbar .k-button.k-dropdown-item[aria-current="true"] {
  color: #8fbfff;
}

.k-markdown-toolbar .k-button-text {
  align-items: baseline;
  display: flex;
  justify-content: space-between;
}

.k-markdown-toolbar .k-button-text kbd {
  background: hsla(0deg 0% 100% / 25%);
  color: white;
  font-variant-numeric: tabular-nums;
  margin-left: 2.5rem;
  padding-block: 2px;
}
</style>
