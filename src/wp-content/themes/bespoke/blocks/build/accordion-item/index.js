(()=>{"use strict";var e,r={665:()=>{const e=window.React,r=window.wp.blocks,t=window.wp.blockEditor,o=JSON.parse('{"u2":"bespoke/accordion-item"}');(0,r.registerBlockType)(o.u2,{edit:function({attributes:r,setAttributes:o}){return(0,e.createElement)("div",{...(0,t.useBlockProps)()},(0,e.createElement)(t.RichText,{className:"accordion-toggle",allowedFormats:["core/bold"],value:r.title,onChange:e=>o({title:e}),placeholder:"Title..."}),(0,e.createElement)("div",{className:"accordion-body"},(0,e.createElement)(t.InnerBlocks,null)))},save:r=>(0,e.createElement)(t.InnerBlocks.Content,null)})}},t={};function o(e){var l=t[e];if(void 0!==l)return l.exports;var n=t[e]={exports:{}};return r[e](n,n.exports,o),n.exports}o.m=r,e=[],o.O=(r,t,l,n)=>{if(!t){var a=1/0;for(u=0;u<e.length;u++){for(var[t,l,n]=e[u],c=!0,i=0;i<t.length;i++)(!1&n||a>=n)&&Object.keys(o.O).every((e=>o.O[e](t[i])))?t.splice(i--,1):(c=!1,n<a&&(a=n));if(c){e.splice(u--,1);var s=l();void 0!==s&&(r=s)}}return r}n=n||0;for(var u=e.length;u>0&&e[u-1][2]>n;u--)e[u]=e[u-1];e[u]=[t,l,n]},o.o=(e,r)=>Object.prototype.hasOwnProperty.call(e,r),(()=>{var e={430:0,707:0};o.O.j=r=>0===e[r];var r=(r,t)=>{var l,n,[a,c,i]=t,s=0;if(a.some((r=>0!==e[r]))){for(l in c)o.o(c,l)&&(o.m[l]=c[l]);if(i)var u=i(o)}for(r&&r(t);s<a.length;s++)n=a[s],o.o(e,n)&&e[n]&&e[n][0](),e[n]=0;return o.O(u)},t=globalThis.webpackChunkep_custom_blocks=globalThis.webpackChunkep_custom_blocks||[];t.forEach(r.bind(null,0)),t.push=r.bind(null,t.push.bind(t))})();var l=o.O(void 0,[707],(()=>o(665)));l=o.O(l)})();