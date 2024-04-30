(()=>{"use strict";var e,t={882:()=>{const e=window.React,t=window.wp.blocks,r=window.wp.blockEditor,o=window.wp.components;function n({currentValue:t,onUpdate:r}){return(0,e.createElement)(o.PanelBody,{title:"Block Attributes",initialOpen:!1},(0,e.createElement)(o.TextControl,{label:"HTML Anchor",help:"Enter a word or two — without spaces — to make a unique web address just for this block, called an “anchor.” Then, you’ll be able to link directly to this section of your page.",value:t,onChange:e=>{r(e)}}))}const a=JSON.parse('{"u2":"bespoke/main-cta"}');(0,t.registerBlockType)(a.u2,{edit:function({attributes:t,setAttributes:o}){return(0,e.createElement)("div",{...(0,r.useBlockProps)()},(0,e.createElement)(r.InspectorControls,null,(0,e.createElement)(n,{currentValue:t.anchor,onUpdate:e=>{o({anchor:e})}})),(0,e.createElement)("div",{className:"container"},(0,e.createElement)(r.InnerBlocks,{template:[["core/heading",{placeholder:"Heading..."}],["core/paragraph",{placeholder:"Text..."}],["core/buttons",{placeholder:"Link..."}]],allowedBlocks:["core/heading","core/paragraph","core/buttons"]})))},save:t=>(0,e.createElement)(r.InnerBlocks.Content,null)})}},r={};function o(e){var n=r[e];if(void 0!==n)return n.exports;var a=r[e]={exports:{}};return t[e](a,a.exports,o),a.exports}o.m=t,e=[],o.O=(t,r,n,a)=>{if(!r){var l=1/0;for(u=0;u<e.length;u++){for(var[r,n,a]=e[u],c=!0,s=0;s<r.length;s++)(!1&a||l>=a)&&Object.keys(o.O).every((e=>o.O[e](r[s])))?r.splice(s--,1):(c=!1,a<l&&(l=a));if(c){e.splice(u--,1);var i=n();void 0!==i&&(t=i)}}return t}a=a||0;for(var u=e.length;u>0&&e[u-1][2]>a;u--)e[u]=e[u-1];e[u]=[r,n,a]},o.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={199:0,432:0};o.O.j=t=>0===e[t];var t=(t,r)=>{var n,a,[l,c,s]=r,i=0;if(l.some((t=>0!==e[t]))){for(n in c)o.o(c,n)&&(o.m[n]=c[n]);if(s)var u=s(o)}for(t&&t(r);i<l.length;i++)a=l[i],o.o(e,a)&&e[a]&&e[a][0](),e[a]=0;return o.O(u)},r=globalThis.webpackChunkep_custom_blocks=globalThis.webpackChunkep_custom_blocks||[];r.forEach(t.bind(null,0)),r.push=t.bind(null,r.push.bind(r))})();var n=o.O(void 0,[432],(()=>o(882)));n=o.O(n)})();