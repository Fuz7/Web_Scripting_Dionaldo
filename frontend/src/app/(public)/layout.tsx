"use client";
import { ReactNode } from "react";

export default function layout({ children }: { children: ReactNode }) {
  return <div className="bg-gray-300">{children}</div>;
}
