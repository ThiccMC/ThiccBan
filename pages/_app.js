import '../styles/css/bootstrap.min.css';
import '../styles/fonts/fontawesome-all.min.css';
import '../styles/css/navbar.css';
import '../styles/css/styles.css';

import NProgress from "nprogress";
import Router from "next/router";
import Head from "next/head";
import { useEffect, useState } from "react";

function MyApp({ Component, pageProps }) {
  useEffect(() => {
    import("../styles/js/bootstrap.min.js");
  }, []);

  const [loading, setLoading] = useState(false);

  Router.events.on("routeChangeStart",(url)=> {
    NProgress.start();
    setLoading(true);
  })

  Router.events.on("routeChangeComplete",(url)=> {
    NProgress.done();
    setLoading(false);
  })

  return <Component {...pageProps} />
}

export default MyApp