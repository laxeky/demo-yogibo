import React, {StyleSheet, Dimensions, PixelRatio} from "react-native";
const {width, height, scale} = Dimensions.get("window"),
    vw = width / 100,
    vh = height / 100,
    vmin = Math.min(vw, vh),
    vmax = Math.max(vw, vh);

export default StyleSheet.create({
    "selectric-wrapper": {
        "position": "relative",
        "cursor": "pointer"
    },
    "selectric-responsive": {
        "width": "100%"
    },
    "selectric": {
        "position": "relative",
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "marginBottom": 10,
        "textAlign": "left",
        "color": "#9D9E9E",
        "textShadow": "0px 0px 0 rgba(256, 256, 256, 1.0)",
        "backgroundColor": "#fff",
        "border": "1px solid #cccccc",
        "borderRadius": 0,
        "width": "100%",
        "fontSize": 22,
        "lineHeight": 22,
        "outline": "none"
    },
    "selectric label": {
        "display": "block",
        "whiteSpace": "nowrap",
        "overflow": "hidden",
        "textOverflow": "ellipsis",
        "marginTop": 0,
        "marginRight": 28,
        "marginBottom": 0,
        "marginLeft": 10,
        "textAlign": "left",
        "fontSize": 18,
        "lineHeight": 32,
        "color": "#444",
        "height": 38,
        "WebkitUserSelect": "none",
        "MozUserSelect": "none",
        "MsUserSelect": "none",
        "userSelect": "none"
    },
    "selectric button": {
        "display": "block",
        "position": "absolute",
        "right": 0,
        "top": 0,
        "width": 38,
        "height": 38,
        "color": "#000",
        "textAlign": "center",
        "font": "0/0 a",
        "Font": "20px / 38px Lucida Sans Unicode, Arial Unicode MS, Arial"
    },
    "selectric button:after": {
        "content": " ",
        "position": "absolute",
        "top": 0,
        "right": 0,
        "bottom": 0,
        "left": 0,
        "marginTop": "auto",
        "marginRight": "auto",
        "marginBottom": "auto",
        "marginLeft": "auto",
        "width": 0,
        "height": 0,
        "border": "5px solid transparent",
        "borderTopColor": "#000",
        "borderBottom": "none"
    },
    "selectric-hover selectric": {
        "borderColor": "#9D9E9E"
    },
    "selectric-hover selectric button": {
        "color": "#9D9E9E"
    },
    "selectric-hover selectric button:after": {
        "borderTopColor": "#9D9E9E"
    },
    "selectric-open": {
        "zIndex": 9999
    },
    "selectric-open selectric": {
        "borderColor": "#C4C4C4"
    },
    "selectric-open selectric-items": {
        "display": "block"
    },
    "selectric-disabled": {
        "filter": "alpha(opacity=50)",
        "opacity": 0.5,
        "cursor": "default",
        "WebkitUserSelect": "none",
        "MozUserSelect": "none",
        "MsUserSelect": "none",
        "userSelect": "none"
    },
    "selectric-hide-select": {
        "position": "relative",
        "overflow": "hidden",
        "width": 0,
        "height": 0
    },
    "selectric-hide-select select": {
        "position": "absolute",
        "left": "-100%",
        "display": "none"
    },
    "selectric-input": {
        "position": "absolute !important",
        "top": "0 !important",
        "left": "0 !important",
        "overflow": "hidden !important",
        "clip": "rect(0, 0, 0, 0) !important",
        "marginTop": 0,
        "marginRight": "!important",
        "marginBottom": 0,
        "marginLeft": "!important",
        "paddingTop": 0,
        "paddingRight": "!important",
        "paddingBottom": 0,
        "paddingLeft": "!important",
        "width": "1px !important",
        "height": "1px !important",
        "outline": "none !important",
        "border": "none !important",
        "Font": "0/0 a !important",
        "background": "none !important"
    },
    "selectric-temp-show": {
        "position": "absolute !important",
        "visibility": "hidden !important",
        "display": "block !important"
    },
    "selectric-items": {
        "display": "none",
        "position": "absolute",
        "top": "100%",
        "left": 0,
        "background": "#F8F8F8",
        "border": "1px solid #C4C4C4",
        "zIndex": -1,
        "boxShadow": "0 0 10px -6px"
    },
    "selectric-items selectric-scroll": {
        "height": "100%",
        "overflow": "auto"
    },
    "selectric-above selectric-items": {
        "top": "auto",
        "bottom": "100%"
    },
    "selectric-items ul": {
        "listStyle": "none",
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "fontSize": 18,
        "lineHeight": 20,
        "minHeight": 20
    },
    "selectric-items li": {
        "listStyle": "none",
        "paddingTop": 10,
        "paddingRight": 10,
        "paddingBottom": 10,
        "paddingLeft": 10,
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "fontSize": 18,
        "lineHeight": 20,
        "minHeight": 20,
        "display": "block",
        "color": "#666",
        "cursor": "pointer"
    },
    "selectric-items liselected": {
        "background": "#EFEFEF",
        "color": "#444"
    },
    "selectric-items li:hover": {
        "background": "#F0F0F0",
        "color": "#444"
    },
    "selectric-items disabled": {
        "filter": "alpha(opacity=50)",
        "opacity": 0.5,
        "cursor": "default !important",
        "background": "none !important",
        "color": "#666 !important",
        "WebkitUserSelect": "none",
        "MozUserSelect": "none",
        "MsUserSelect": "none",
        "userSelect": "none"
    },
    "selectric-items selectric-group selectric-group-label": {
        "fontWeight": "bold",
        "paddingLeft": 10,
        "cursor": "default",
        "WebkitUserSelect": "none",
        "MozUserSelect": "none",
        "MsUserSelect": "none",
        "userSelect": "none",
        "background": "none",
        "color": "#444"
    },
    "selectric-items selectric-groupdisabled li": {
        "filter": "alpha(opacity=100)",
        "opacity": 1
    },
    "selectric-items selectric-group li": {
        "paddingLeft": 25
    }
});